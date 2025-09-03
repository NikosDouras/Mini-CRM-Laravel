<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function authenticated_user_can_view_companies_index(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('companies.index'))
            ->assertOk()
            ->assertSee('Companies');
    }

    #[Test]
    public function user_can_create_company_with_logo(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('companies.store'), [
            'name'    => 'Acme Inc',
            'email'   => 'acme@example.com',
            'website' => 'http://acme.com',
            'logo'    => UploadedFile::fake()->image('logo.png', 120, 120),
        ]);

        $response->assertRedirect(route('companies.index'));
        $this->assertDatabaseHas('companies', ['name' => 'Acme Inc']);

        $company = Company::first();
        Storage::disk('public')->assertExists($company->logo); // e.g. "logos/abc.png"
    }

    #[Test]
    public function name_is_required(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('companies.store'), ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
