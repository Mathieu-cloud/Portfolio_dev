# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Personal portfolio website for Mathieu Moreau, built with Laravel 12, Livewire/Volt, and Flux UI. The site is in French — model names, database columns, and most UI text use French naming (e.g., `Projet`, `Technologie`, `nom`, `lien`).

## Commands

- **Dev server** (Laravel + queue + Vite hot-reload): `composer dev`
- **Build assets**: `npm run build`
- **Run all tests**: `composer test` (or `php artisan test`)
- **Run a single test**: `php artisan test --filter=TestName`
- **Lint/format PHP**: `./vendor/bin/pint`
- **Run migrations**: `php artisan migrate`
- **Initial setup**: `composer setup`

## Tech Stack

- **PHP 8.4 / Laravel 12** with **Livewire Volt** (single-file components) and **Flux** (UI component library)
- **Laravel Fortify** for auth (login, register, 2FA)
- **Tailwind CSS 4** via `@tailwindcss/vite` plugin
- **Vite** for asset bundling (entrypoints: `app.css`, `app.js`, `generateur.js`)
- **Pest** for testing (PHP)
- **MySQL** in production; **SQLite :memory:** for tests
- Hosted locally via **Laravel Herd** (Windows)

## Architecture

### Layouts

Two layout systems coexist:
- **`components/layouts/app.blade.php`** — Flux-based app layout (used for authenticated/dashboard pages via `<x-layouts.app>`)
- **`components/layouts/head-index.blade.php`** — standalone HTML head for the public portfolio page (`index.blade.php`), which does NOT use the app layout

### Public Pages

- **`/`** — Portfolio homepage (`resources/views/index.blade.php`): hero animation, about, skills, projects, contact. Uses Blade components from `components/portfolios/` and Livewire components (`<livewire:project-list>`, `<livewire:contact-form>`).
- **`/cybersecurites`** — Cybersecurity tools page

### Livewire Components

- **`App\Livewire\ProjectList`** — displays projects with lazy-loading placeholder
- **`App\Livewire\ContactForm`** — contact form that sends email via Laravel Mail
- **`App\Livewire\HeadersAnalyzer`** — HTTP headers analysis tool (cybersecurity section)
- **Volt single-file components** in `resources/views/livewire/settings/` and `resources/views/livewire/auth/` for auth flows

### Data Model

- **`Projet`** ↔ **`Technologie`**: many-to-many via `projet_technologie` pivot table
- Column names are in French: `nom`, `description`, `image`, `lien` (Projet); `nom` (Technologie)
- Project images are stored in `public/uploads/projects/` (not via Laravel Storage)

### Admin

- **`ProjetController`** handles CRUD for projects (create/edit/update) behind `auth` + `verified` middleware
- Admin views in `resources/views/admins/projects/`
- Dashboard at `/dashboard` (authenticated only)

### Frontend Assets

- `resources/js/hero.js` — hero section animation
- `resources/js/generateur.js` — password generator (cybersecurity page, separate Vite entrypoint)
- `resources/css/app.css` — main stylesheet with Tailwind

## Profil Développeur Web & Cybersécurité

## 🎯 Identité & contexte

- **Rôle** : Développeur web freelance spécialisé en cybersécurité applicative
- **Stack principal** : PHP/Laravel, Python (Django/Flask)
- **Niveau cybersec** : Intermédiaire (OWASP, pentest web, audit de code)
- **Langue** : Code et nommage en anglais, commentaires et documentation en français

---

## 🔐 RÈGLES DE SÉCURITÉ — TOUJOURS APPLIQUÉES

Ces règles s'appliquent à CHAQUE génération de code, sans exception.

### Validation & entrées utilisateur
- **Ne jamais faire confiance aux entrées utilisateur.** Toujours valider côté serveur, même si une validation front existe.
- Utiliser les Form Requests (Laravel) ou les serializers/forms (Django) pour la validation. Jamais de validation manuelle dans les contrôleurs.
- Toujours typer et contraindre les paramètres : longueur max, format attendu, whitelist de valeurs.
- Échapper systématiquement les sorties HTML (`{{ }}` en Blade, `|escape` en Jinja2).

### Injection & requêtes
- **SQL** : Utiliser exclusivement l'ORM (Eloquent / Django ORM) ou les requêtes paramétrées. Zéro concaténation de chaînes dans les requêtes.
- **Commandes OS** : Ne jamais utiliser `shell_exec()`, `exec()`, `os.system()`, `subprocess.run(shell=True)`. Si absolument nécessaire, utiliser `shlex.quote()` (Python) ou `escapeshellarg()` (PHP) + whitelist de commandes.
- **LDAP / XPath / NoSQL** : Appliquer le même principe de paramétrage.

### Authentification & sessions
- Hashage des mots de passe : `bcrypt` ou `argon2id` uniquement. Jamais MD5/SHA1/SHA256 seul.
- Tokens : utiliser `secrets.token_urlsafe(32)` (Python) ou `Str::random(64)` (Laravel).
- Sessions : `httpOnly`, `secure`, `SameSite=Lax` minimum. Régénérer l'ID de session après login.
- Implémenter le rate limiting sur les endpoints d'authentification (`ThrottleRequests` Laravel, `django-ratelimit`).

### Autorisation
- Toujours vérifier les permissions côté serveur (Policies/Gates Laravel, `@permission_required` Django).
- Vérifier que l'utilisateur est bien propriétaire de la ressource (IDOR) : ne jamais se fier à un ID passé par le client sans vérification.
- Appliquer le principe du moindre privilège partout.

### Headers & transport
- Forcer HTTPS partout. Configurer HSTS.
- Headers de sécurité obligatoires dans chaque projet :
  ```
  Content-Security-Policy: default-src 'self'; script-src 'self'
  X-Content-Type-Options: nosniff
  X-Frame-Options: DENY
  Referrer-Policy: strict-origin-when-cross-origin
  Permissions-Policy: camera=(), microphone=(), geolocation=()
  ```

### Gestion des secrets
- **Jamais** de credentials, clés API, ou tokens dans le code source.
- Utiliser `.env` (jamais commité) + variables d'environnement.
- En production : utiliser un vault (HashiCorp Vault, AWS Secrets Manager) si possible.
- Vérifier que `.env`, `*.key`, `*.pem` sont dans le `.gitignore`.

### Upload de fichiers
- Valider le type MIME côté serveur (pas seulement l'extension).
- Renommer les fichiers uploadés avec un UUID.
- Stocker les uploads hors du document root.
- Limiter la taille maximale. Scanner si possible (ClamAV).
- Ne jamais exécuter ou inclure un fichier uploadé.

---

## 📋 CONVENTIONS DE CODE

### PHP / Laravel
- Suivre PSR-12 pour le style de code.
- Utiliser les **Form Requests** pour la validation, jamais `$request->input()` directement sans validation.
- Préférer les **Resource Controllers** et les **API Resources** pour structurer les réponses.
- Utiliser `$fillable` (jamais `$guarded = []`) sur les modèles Eloquent.
- Activer le mode strict d'Eloquent en dev : `Model::shouldBeStrict()`.
- Typer les retours de méthodes et les paramètres (PHP 8.1+).

### Python / Django / Flask
- Suivre PEP 8. Utiliser les type hints partout.
- Django : utiliser les **class-based views** avec les mixins d'autorisation (`LoginRequiredMixin`, `PermissionRequiredMixin`).
- Flask : structurer en Blueprints. Utiliser Flask-Login + Flask-WTF (CSRF).
- Toujours utiliser un virtualenv. Figer les dépendances (`pip freeze > requirements.txt` ou `poetry.lock`).
- Préférer `pathlib.Path` à la manipulation manuelle de chemins.

### Commentaires & documentation
- Commentaires en **français**, concis, orientés "pourquoi" (pas "quoi").
- Docstrings en français sur chaque fonction/méthode publique.
- Ajouter un tag `# SECURITY:` avant tout bloc de code lié à la sécurité pour faciliter les audits.
- Ajouter un tag `# TODO-SEC:` pour les points de sécurité à revoir/améliorer.

### Git & versioning
- Messages de commit en français, format : `type(scope): description`
  - Types : `feat`, `fix`, `sec`, `refactor`, `docs`, `test`, `ci`
  - Exemple : `sec(auth): ajouter rate limiting sur /login`
- Branching : `main` (production), `develop` (intégration), `feature/*`, `fix/*`, `sec/*`
- Ne jamais push sur `main` directement.

---

## 🛡️ PENTEST & AUDIT — CHECKLIST

Quand je demande un audit ou une revue de sécurité, appliquer cette méthodologie :

### Analyse statique (à chaque revue)
1. Chercher les vulnérabilités OWASP Top 10 dans l'ordre :
   - Injection (SQL, OS, LDAP)
   - Broken Authentication
   - Sensitive Data Exposure
   - XXE
   - Broken Access Control (IDOR, privilege escalation)
   - Security Misconfiguration
   - XSS (Stored, Reflected, DOM)
   - Insecure Deserialization
   - Components with Known Vulnerabilities
   - Insufficient Logging
2. Vérifier la gestion des erreurs : aucune stack trace en production, messages d'erreur génériques.
3. Vérifier les dépendances : `composer audit` (Laravel), `pip audit` ou `safety check` (Python).

### Format de rapport
Pour chaque vulnérabilité trouvée, utiliser ce format :
```
### [CRITICITÉ] Titre de la vulnérabilité
- **Catégorie OWASP** : A01-A10
- **Localisation** : fichier:ligne
- **Description** : explication claire du problème
- **Impact** : ce qu'un attaquant pourrait faire
- **Preuve de concept** : payload ou scénario d'exploitation
- **Remédiation** : code corrigé ou recommandation précise
- **Priorité** : Critique / Haute / Moyenne / Basse
```

---

## ⚙️ DEVSECOPS & CI/CD

### Pipeline de sécurité (GitHub Actions / GitLab CI)
Quand je demande de configurer une pipeline, toujours inclure ces étapes :
1. **Linting & SAST** : Semgrep (gratuit, règles OWASP) ou PHPStan/Psalm (Laravel), Bandit (Python)
2. **Audit des dépendances** : `composer audit`, `pip audit`, Dependabot/Renovate
3. **Secrets scanning** : Gitleaks ou TruffleHog
4. **Tests de sécurité** : tests unitaires spécifiques aux cas de sécurité (auth bypass, injection, CSRF)

### Exemple de structure attendue (GitHub Actions)
```yaml
# Toujours proposer ce squelette quand je configure un projet
security-checks:
  - lint + analyse statique
  - audit dépendances
  - scan de secrets
  - tests unitaires sécu
  - (optionnel) DAST avec ZAP en staging
```

---

## 📏 CONFORMITÉ — RAPPELS

### RGPD (toujours applicable si projet EU)
- Minimisation des données : ne collecter que ce qui est strictement nécessaire.
- Consentement explicite avant tout traitement de données personnelles.
- Droit de suppression : prévoir un mécanisme de purge/anonymisation.
- Chiffrement des données sensibles au repos (AES-256) et en transit (TLS 1.2+).
- Journaliser les accès aux données personnelles.

### Logging & monitoring
- Logger les événements de sécurité : tentatives de login échouées, changements de permissions, accès admin.
- Ne jamais logger de données sensibles (mots de passe, tokens, données perso).
- Format structuré (JSON) pour faciliter l'ingestion par un SIEM.

---

## 🤖 INSTRUCTIONS POUR CLAUDE

### Comportement général
- **Toujours penser sécurité en premier.** Avant d'écrire du code, identifier les vecteurs d'attaque possibles.
- Si je demande un code rapide/prototype, ajouter quand même les protections de base (validation, échappement, requêtes paramétrées) et signaler les points à renforcer avec `# TODO-SEC:`.
- Ne jamais proposer de code avec des vulnérabilités connues, même dans un exemple "simple".
- Si une de mes demandes introduirait une faille de sécurité, me prévenir clairement avant de coder.

### Format des réponses code
- Inclure un bloc `# SECURITY:` en tête de chaque fichier généré listant les mesures de sécurité appliquées.
- Proposer les tests de sécurité associés quand pertinent.
- Si le code touche à l'authentification, l'autorisation, ou la manipulation de données sensibles, ajouter une section "Considérations sécurité" dans la réponse.

### Quand je dis...
- **"audit ce code"** → Appliquer la checklist OWASP Top 10 complète et produire un rapport structuré.
- **"sécurise ça"** → Identifier les failles, corriger le code, expliquer chaque correction.
- **"pipeline CI"** → Proposer une pipeline complète avec les étapes sécu (SAST, audit deps, secrets scan).
- **"quick fix"** → Corriger rapidement MAIS ne jamais sacrifier la sécurité. Signaler les raccourcis pris.
- **"explique la vuln"** → Fournir : description, impact, PoC, remédiation, références (CWE, CVE si applicable).

