# Bizacharya

Laravel + MySQL site for Bizacharya Consulting Pvt. Ltd., with a custom (non-Filament) admin panel for managing all content — pages, sectors, services, events, jobs, learning hub posts/videos, navigation menu, site settings and leads.

No frontend build step is required — the public site and admin panel both use plain Blade + CSS/JS served straight from `public/assets`, so `npm run build` is not needed to run the site.

## Requirements

- PHP 8.3+
- Composer
- MySQL 8 (or MariaDB)

## Setup (fresh clone)

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials (create the database first, e.g. `CREATE DATABASE bizacharya;`):

```
DB_DATABASE=bizacharya
DB_USERNAME=your_mysql_user
DB_PASSWORD=your_mysql_password
```

Then run:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

`migrate --seed` creates every table **and** seeds it with the same demo content this project was built and tested with — all pages, sectors, services, events, jobs, learning hub posts/videos, the navigation menu, and the admin user. The design's real photos (sector/service/event images) are checked into `storage/app/public/{sectors,services,events}` and are already wired up by the seeder, so a fresh clone renders identically to the original build — no manual image upload needed.

## Admin panel

```
http://localhost:8000/bizacharya-admin/login
```

Seeded login: `admin@bizacharya.com` / `password` — **change this before going live** (My Profile → Change Password, once logged in).

## Important: the database itself does not travel with git

Git only tracks the code in this repository (migrations, seeders, views, controllers, and the seed images above). It does **not** track the live MySQL database. That means:

- A fresh clone starts with an empty database until `php artisan migrate --seed` is run.
- Anything created only through the live admin panel or public forms after that — edited page copy, new sectors/events, enquiries, event registrations, job applications, uploaded CVs, admin password changes — exists only in that MySQL database and will **not** appear for someone else who clones the repo, unless it's also reflected in `database/seeders/DesignContentSeeder.php` or you export/import the actual database (`mysqldump`) separately.
- `.env` (database credentials, app key) is intentionally excluded from git for security — each environment needs its own.

In short: cloning the repo gives everyone the same *starting* site (same demo content, same images, same admin login). Real day-to-day data (leads, live content edits) needs its own migration path — either keep the seeder in sync, or share a database dump/backup alongside the code.
