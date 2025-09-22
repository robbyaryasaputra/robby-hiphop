# Copilot Instructions for AI Agents

## Project Overview
This is a Laravel-based PHP web application. The project follows standard Laravel conventions for structure, routing, controllers, models, and views. Key directories:
- `app/Http/Controllers/` — Controller classes (e.g., `PegawaiController.php`)
- `app/Models/` — Eloquent ORM models (e.g., `User.php`)
- `routes/web.php` — Web routes (HTTP endpoints)
- `resources/views/` — Blade templates for HTML rendering
- `database/migrations/` — Database schema migrations
- `tests/` — Feature and unit tests

## Developer Workflows
- **Start local server:** `php artisan serve`
- **Run tests:** `vendor\bin\phpunit` (Windows) or `php artisan test`
- **Install dependencies:** `composer install` (PHP), `npm install` (JS/CSS)
- **Migrate DB:** `php artisan migrate`
- **Seed DB:** `php artisan db:seed`

## Project-Specific Patterns
- Controllers return data to Blade views or as JSON for APIs.
- Use Eloquent models for DB access; avoid raw SQL unless necessary.
- Blade templates are in `resources/views/` and use `.blade.php` extension.
- Route definitions are in `routes/web.php` (web) and `routes/api.php` (API).
- For new features, create a controller, define routes, and add views as needed.

## Example: PegawaiController Data Structure
When implementing `index()` in `PegawaiController`, return an array with keys:
- `name`: string
- `my_age`: integer (age from birthdate)
- `hobbies`: array (min. 5 items)
- `tgl_harus_wisuda`: graduation date (Y-m-d)
- `time_to_study_left`: days until graduation
- `current_semester`: integer
- `future_goal`: string
- Conditional message: if `current_semester < 3` show "Masih Awal, Kejar TAK", else "Jangan main-main, kurang-kurangi main game!"

## Conventions
- Use PSR-12 code style for PHP.
- Use Laravel's built-in helpers and facades where possible.
- Place business logic in controllers or service classes, not in routes or views.

## Integration Points
- Uses Composer for PHP dependencies (`composer.json`).
- Uses NPM/Vite for frontend assets (`package.json`, `vite.config.js`).
- Database config in `config/database.php` (SQLite by default).

## References
- [Laravel Documentation](https://laravel.com/docs)
- See `README.md` for more general info.

---
_If you are unsure about a workflow or pattern, check the Laravel docs or inspect the relevant directory for examples._
