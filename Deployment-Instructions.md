# Clone the repo
git clone https://github.com/NikosDouras/Mini-CRM-Laravel.git
cd Mini-CRM-Laravel

# (Optional) Open project in VS Code
code .

# paste the provided .env into the project directory

# Make sure .env contains:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=company_employee_crm
# DB_USERNAME=root
# DB_PASSWORD=password

# Or change the .env to match your DB.

# Install PHP dependencies
composer install

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Create admin account
php artisan db:seed --class=AdminUserSeeder

# Populate tables with dummy data
php artisan db:seed --class=CompanyEmployeeSeeder

# Build frontend assets
npm install
npm run build

# Run the application
php artisan serve

