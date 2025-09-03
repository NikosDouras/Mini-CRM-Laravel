<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // Create 15 companies
        Company::factory(15)->create();

        // For each company, create 3 employees
        Company::all()->each(function ($company) {
            Employee::factory(3)->create([
                'company_id' => $company->id,
            ]);
        });
    }
}

