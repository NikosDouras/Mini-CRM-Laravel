<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CompanyCascadeDeleteTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function deleting_a_company_also_deletes_its_employees(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();
        Employee::factory()->count(3)->create(['company_id' => $company->id]);

        $this->assertDatabaseCount('employees', 3);

        $this->actingAs($user)
            ->delete(route('companies.destroy', $company))
            ->assertRedirect();

        $this->assertDatabaseMissing('companies', ['id' => $company->id]);
        $this->assertDatabaseCount('employees', 0);
    }
}
