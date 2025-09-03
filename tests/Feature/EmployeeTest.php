<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_can_view_employees_index(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('employees.index'))
            ->assertOk()
            ->assertSee('Employees');
    }

    #[Test]
    public function user_can_create_employee(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $this->actingAs($user)->post(route('employees.store'), [
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'company_id' => $company->id,
            'email'      => 'john@example.com',
            'phone'      => '123456789',
        ])->assertRedirect(route('employees.index'));

        $this->assertDatabaseHas('employees', [
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'company_id' => $company->id,
        ]);
    }

    #[Test]
    public function first_and_last_name_are_required(): void
    {
        $user = User::factory()->create();
        $company = Company::factory()->create();

        $this->actingAs($user)->post(route('employees.store'), [
            'first_name' => '',
            'last_name'  => '',
            'company_id' => $company->id,
        ])->assertSessionHasErrors(['first_name', 'last_name']);
    }
}
