<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;

class HeadersAnalyzer extends Component
{
    #[Validate('required|url')]
    public string $url = '';

    public array $results = [];
    public string $grade = '';
    public int $score = 0;
    public bool $analyzed = false;
    public string $error = '';
    public string $finalUrl = '';

    private array $securityHeaders = [
        'strict-transport-security' => [
            'display' => 'Strict-Transport-Security',
            'description' => 'Force le navigateur à utiliser HTTPS, empêche les attaques man-in-the-middle.',
            'recommendation' => 'Ajouter: Strict-Transport-Security: max-age=31536000; includeSubDomains',
        ],
        'content-security-policy' => [
            'display' => 'Content-Security-Policy',
            'description' => 'Contrôle les sources de contenu autorisées, protège contre les attaques XSS.',
            'recommendation' => "Ajouter: Content-Security-Policy: default-src 'self'",
        ],
        'x-content-type-options' => [
            'display' => 'X-Content-Type-Options',
            'description' => 'Empêche le navigateur de deviner le type MIME, bloque le MIME sniffing.',
            'recommendation' => 'Ajouter: X-Content-Type-Options: nosniff',
        ],
        'x-frame-options' => [
            'display' => 'X-Frame-Options',
            'description' => 'Empêche l\'affichage du site dans une iframe, protège contre le clickjacking.',
            'recommendation' => 'Ajouter: X-Frame-Options: DENY',
        ],
        'referrer-policy' => [
            'display' => 'Referrer-Policy',
            'description' => 'Contrôle les informations envoyées dans le header Referer lors de la navigation.',
            'recommendation' => 'Ajouter: Referrer-Policy: strict-origin-when-cross-origin',
        ],
        'permissions-policy' => [
            'display' => 'Permissions-Policy',
            'description' => 'Limite l\'accès aux fonctionnalités du navigateur (caméra, micro, géolocalisation).',
            'recommendation' => 'Ajouter: Permissions-Policy: camera=(), microphone=(), geolocation=()',
        ],
        'cross-origin-opener-policy' => [
            'display' => 'Cross-Origin-Opener-Policy',
            'description' => 'Isole le contexte de navigation pour empêcher les attaques cross-origin.',
            'recommendation' => 'Ajouter: Cross-Origin-Opener-Policy: same-origin',
        ],
        'cross-origin-resource-policy' => [
            'display' => 'Cross-Origin-Resource-Policy',
            'description' => 'Contrôle quels sites peuvent charger vos ressources.',
            'recommendation' => 'Ajouter: Cross-Origin-Resource-Policy: same-origin',
        ],
        'cross-origin-embedder-policy' => [
            'display' => 'Cross-Origin-Embedder-Policy',
            'description' => 'Requis pour l\'isolation cross-origin et les fonctionnalités avancées (SharedArrayBuffer).',
            'recommendation' => 'Ajouter: Cross-Origin-Embedder-Policy: require-corp',
        ],
        'x-xss-protection' => [
            'display' => 'X-XSS-Protection',
            'description' => 'Active le filtre XSS intégré des anciens navigateurs (déprécié mais encore vérifié).',
            'recommendation' => 'Ajouter: X-XSS-Protection: 1; mode=block',
        ],
    ];

    public function analyze(): void
    {
        $this->validate();
        $this->reset('results', 'grade', 'score', 'error', 'analyzed', 'finalUrl');

        // Fix 1 — Protection SSRF : bloquer les IP privées/locales
        $host = parse_url($this->url, PHP_URL_HOST);
        if ($host) {
            $ip = gethostbyname($host);
            if ($this->isPrivateIp($ip)) {
                $this->error = 'Les adresses IP privées ou locales ne sont pas autorisées.';
                $this->analyzed = true;
                return;
            }
        }

        // Fix 4 — Rate limiting : max 5 analyses par minute par IP
        $key = 'headers-analyzer:' . request()->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->error = "Trop de requêtes. Réessayez dans {$seconds} secondes.";
            $this->analyzed = true;
            return;
        }
        RateLimiter::hit($key, 60);

        try {
            // Fix 1 — Suivre les redirections (comme securityheaders.com)
            // Fix 2 — User-Agent navigateur pour éviter les réponses différentes pour bots
            $response = Http::timeout(10)
                ->withHeaders([
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36',
                ])
                ->get($this->url);

            // Afficher l'URL finale après redirections
            $this->finalUrl = $response->effectiveUri()?->__toString() ?? $this->url;

            // Normaliser les clés en minuscules pour comparaison case-insensitive
            $rawHeaders = $response->headers();
            $headers = [];
            foreach ($rawHeaders as $name => $values) {
                $headers[strtolower($name)] = $values;
            }

            $found = 0;
            foreach ($this->securityHeaders as $headerKey => $info) {
                // Fix 3 — Vérifier aussi les variantes Report-Only pour CSP
                $present = isset($headers[$headerKey]);
                $value = '';
                $reportOnly = false;

                if ($present) {
                    $value = implode(', ', $headers[$headerKey]);
                } elseif ($headerKey === 'content-security-policy' && isset($headers['content-security-policy-report-only'])) {
                    $present = true;
                    $reportOnly = true;
                    $value = implode(', ', $headers['content-security-policy-report-only']);
                }

                if ($present) {
                    $found++;
                }

                $this->results[] = [
                    'name' => $info['display'],
                    'present' => $present,
                    'value' => $present ? ($reportOnly ? '(Report-Only) ' : '') . $value : '',
                    'description' => $info['description'],
                    'recommendation' => $info['recommendation'],
                ];
            }

            $total = count($this->securityHeaders);
            $this->score = (int) round(($found / $total) * 100);
            $this->grade = match (true) {
                $this->score >= 90 => 'A+',
                $this->score >= 80 => 'A',
                $this->score >= 70 => 'B',
                $this->score >= 60 => 'C',
                $this->score >= 40 => 'D',
                default => 'F',
            };
        } catch (\Exception $e) {
            $this->error = 'Impossible de joindre cette URL. Vérifiez qu\'elle est correcte et accessible.';
        }

        $this->analyzed = true;
    }

    // Fix 1 — Vérifie si une IP est privée ou réservée
    private function isPrivateIp(string $ip): bool
    {
        return !filter_var(
            $ip,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        );
    }

    public function render()
    {
        return view('livewire.headers-analyzer');
    }
}
