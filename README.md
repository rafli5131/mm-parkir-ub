# University Parking Management

A Laravel and Filament web application for administering parking facilities, student records, and vehicle entry and exit activity in a university setting.

## Features in the codebase

- **Parking facilities:** maintain parking lots, locations, capacities, and faculty associations.
- **Student data:** manage student records through the administration interface.
- **Parking activity:** record entry and exit times and parking status.
- **Administration:** manage records through Filament resources.

## Technology

PHP 8.2+, Laravel 11, Filament 3, Livewire, and Vite. Database configuration follows Laravel's environment-based setup.

## Local setup

```bash
git clone https://github.com/rafli5131/mm-parkir-ub.git
cd mm-parkir-ub
composer install
cp .env.example .env
php artisan key:generate
```

Configure your database connection in `.env`, then run the migrations:

```bash
php artisan migrate
npm install
npm run build
php artisan serve
```

The Filament administration panel is configured through the application provider. Review the project's authentication and database setup before exposing it to a public network.

## Project structure

- `app/Models/` — students, faculties, parking lots, and entry records.
- `app/Filament/Resources/` — resource forms, tables, and administration screens.
- `database/` — migrations, factories, and seeders.
- `resources/` and `public/` — frontend assets.

## Scope

This is a project repository, not a claim of a production parking deployment. The README documents functionality represented in the source code; testing and deployment should be validated for the target environment.
