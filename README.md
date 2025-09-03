Here you go—same steps, just cleaner and easy to skim. You can drop this straight into your README.

# Mini-CRM (Laravel) — Quick Setup

> **DB config** (MySQL):
>
> ```
> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=company_employee_crm
> DB_USERNAME=root
> DB_PASSWORD=password
> ```

## 1) Clone & enter project

```bash
git clone https://github.com/NikosDouras/Mini-CRM-Laravel.git
cd Mini-CRM-Laravel
# (optional)
code .
```

## 2) Environment file

```bash
cp .env.example .env
```

Edit `.env` and set the DB values shown above.

## 3) PHP deps

```bash
composer install
```

## 4) App key

```bash
php artisan key:generate
```

## 5) Migrate DB

```bash
php artisan migrate
```

## 6) Seed data

```bash
# Admin account
php artisan db:seed --class=AdminUserSeeder

# Dummy companies & employees
php artisan db:seed --class=CompanyEmployeeSeeder
```

## 7) Frontend assets

```bash
npm install
npm run build
```

## 8) Run the app

```bash
php artisan serve
```

> Tip: If the DB doesn’t exist yet, create it first in MySQL (Workbench/CLI) with the name `company_employee_crm`.
