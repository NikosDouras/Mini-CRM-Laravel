# Mini‑CRM‑Laravel — Setup & Run Guide

> A tidy, copy‑paste friendly guide to get the project running locally in minutes.

---

## ✅ Prerequisites

* **PHP** 8.2+ (with `pdo_mysql`)
* **Composer**
* **Node.js** 18+ & **npm**
* **MySQL** 8+ (or MariaDB 10.6+)

> Tip (Windows): Use **Laragon**, **XAMPP**, or **Docker** if you prefer a bundled stack.

---

## 🔧 Database Setup (MySQL)

Create a MySQL database and user (or use `root`). Example credentials used below:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=company_employee_crm
DB_USERNAME=root
DB_PASSWORD=password
```

---

## 🚀 Quickstart (TL;DR)

```bash
# 1) Clone & enter the project
git clone https://github.com/NikosDouras/Mini-CRM-Laravel.git
cd Mini-CRM-Laravel

# 2) Environment
cp .env.example .env           # Windows PowerShell: copy .env.example .env

# 3) Configure DB in .env (use the values above)
#    Then generate the APP_KEY used for encryption
composer install
php artisan key:generate

# 4) Migrate & seed
php artisan migrate
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=CompanyEmployeeSeeder

# 5) Frontend assets (Vite)
npm install
npm run build                  # or: npm run dev

# 6) Run the app
php artisan serve
```

App will be available at: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🧩 Detailed Steps

### 1) Clone the repository

```bash
git clone https://github.com/NikosDouras/Mini-CRM-Laravel.git
cd Mini-CRM-Laravel
```

(Optional) open in VS Code:

```bash
code .
```

### 2) Environment configuration

Create your `.env` file:

```bash
cp .env.example .env          # macOS/Linux
# or on Windows (PowerShell):
copy .env.example .env
```

Edit `.env` and set your DB credentials (from the **Database Setup** section). Then run:

```bash
composer install
php artisan key:generate
```

### 3) Database migrations & seeders

Run migrations:

```bash
php artisan migrate
```

Seed data (admin user + demo companies/employees):

```bash
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=CompanyEmployeeSeeder
```

> **Note:** Update the default admin credentials in `database/seeders/AdminUserSeeder.php` if needed. Add the actual email/password to this README for testers.

### 4) Build frontend assets

```bash
npm install
npm run build     # for production build
# or keep a dev server running:
# npm run dev
```

### 5) Serve the application

```bash
php artisan serve
```

Open **[http://127.0.0.1:8000](http://127.0.0.1:8000)** in your browser.

---

## 🔐 Default Admin Login (fill in)

Add the credentials used by `AdminUserSeeder` here for convenience:

* **Email:** `admin@example.com`
* **Password:** `password123`

> Replace the above with the real values from your seeder before sharing the repo.

---

## 🛠️ Troubleshooting

* **`vendor/autoload.php` not found** → Run `composer install`.
* **`APP_KEY is missing`** → Run `php artisan key:generate`.
* **`SQLSTATE[HY000] [1045] Access denied`** → Check DB username/password/host in `.env`.
* **`Vite manifest not found`** → Run `npm install && npm run build` (or `npm run dev`).
* **Migrations won’t run in production** → You might see a confirmation prompt. Type `yes`.

---

## 📦 Scripts you’ll use often

```bash
# Start dev server
php artisan serve

# Rebuild front-end quickly
npm run build

# Reset DB (dangerous: clears data!)
php artisan migrate:fresh --seed
```

---

## 📝 Notes

* Keep `main` stable; create feature branches and open PRs for changes.
* If you switch to SQLite for local testing, update `.env` accordingly and create `database/database.sqlite`.

Happy hacking! 💻✨
