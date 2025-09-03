
# Mini-CRM (Laravel) — Setup

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

paste .env in project directory or

Edit `.env` and set the DB values shown above.

## 3) PHP dependencies

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

## 9) Run the tests

```bash
php artisan test --filter=CompanyTest  
php artisan test --filter=EmployeeTest
php artisan test --filter=CompanyCascadeDeleteTest
```
