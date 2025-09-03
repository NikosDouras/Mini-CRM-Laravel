<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;

class CompanyEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Create 15 companies
        Company::factory(15)->create();

        // Each company with 3 employees
        Company::all()->each(function ($company) {
            Employee::factory(3)->create([
                'company_id' => $company->id,
            ]);
        });
    }
}
