```markdown
# Deployment & Setup Instructions

This guide shows how to run **Mini-CRM-Laravel** locally.

---

## 1) Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+ and npm
- MySQL 8.x

---

## 2) Database Setup

Create a MySQL database and credentials (or adjust your `.env` accordingly):

```

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=company_employee_crm
DB_USERNAME=root
DB_PASSWORD=password

````

> If you prefer, just change the `.env` values to match your local DB user/password.

---

## 3) Get the Code

```bash
git clone https://github.com/NikosDouras/Mini-CRM-Laravel.git
cd Mini-CRM-Laravel
````

(Optional) open in VS Code:

```bash
code .
```

---

## 4) Environment File

* **Option A:** Paste your provided `.env` file into the project root.
* **Option B:** Copy the example and edit it:

  ```bash
  cp .env.example .env
  ```

  Then update DB credentials (see step 2).

If your `.env` does **not** contain an `APP_KEY`, generate one:

```bash
php artisan key:generate
```

---

## 5) Install Dependencies

PHP dependencies:

```bash
composer install
```

Frontend dependencies:

```bash
npm install
```

---

## 6) Migrate & Seed Data

Run database migrations:

```bash
php artisan migrate
```

Create the admin account:

```bash
php artisan db:seed --class=AdminUserSeeder
```

Populate tables with dummy data:

```bash
php artisan db:seed --class=CompanyEmployeeSeeder
```

> If logos are stored under `storage/app/public`, ensure the public symlink exists:

```bash
php artisan storage:link
```

---

## 7) Build Frontend

For a production build:

```bash
npm run build
```

(For development, you can also use `npm run dev` in a separate terminal.)

---

## 8) Run the App

```bash
php artisan serve
```

By default the app will be available at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 9) Tests

Run individual test classes as needed:

```bash
php artisan test --filter=CompanyTest
php artisan test --filter=EmployeeTest
php artisan test --filter=CompanyCascadeDeleteTest
```



---

```
```
