# Portfolio Dev

Portfolio personnel développé avec Laravel 12 et Livewire pour présenter mes projets de développement web.

## Technologies

- **Backend** : PHP 8.4, Laravel 12
- **Frontend** : Livewire Volt, Flux, Tailwind CSS 4
- **Authentification** : Laravel Fortify
- **Base de données** : MySql
- **Build** : Vite

## Fonctionnalités

- Affichage des projets avec leurs technologies associées
- Interface d'administration pour gérer les projets (CRUD)
- Authentification sécurisée avec 2FA disponible
- Design responsive avec Tailwind CSS

## Prérequis

- PHP >= 8.4
- Composer
- Node.js & npm

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/votre-username/portfolio.git
   cd portfolio
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   npm install
   ```

3. **Configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Base de données**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

5. **Build des assets**
   ```bash
   npm run build
   ```

## Développement

Lancer le serveur de développement :

```bash
composer dev
```

Cette commande démarre simultanément :
- Le serveur Laravel
- La file d'attente
- Vite (hot reload)

## Structure du Projet

```
app/
├── Http/Controllers/
│   └── ProjetController.php    # Gestion des projets
├── Livewire/
│   └── ProjectList.php         # Composant liste des projets
├── Models/
│   ├── Projet.php              # Modèle projet
│   ├── Technologie.php         # Modèle technologie
│   └── User.php                # Modèle utilisateur
resources/views/
├── admins/projects/            # Vues admin (create, edit)
├── livewire/                   # Composants Livewire
└── components/                 # Composants Blade
```

## Licence

© 2025 Mathieu Moreau - Tous droits réservés
