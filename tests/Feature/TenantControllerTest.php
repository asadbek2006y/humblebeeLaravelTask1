<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_tenant_details()
    {
        $tenant = Tenant::create([
            'name' => 'Test Tenant',
            'domain' => 'test.domain.com',
            'config_json' => json_encode(['enable_feature_x' => true, 'theme' => 'dark']),
        ]);

        $response = $this->getJson("/api/tenants/{$tenant->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Test Tenant'])
            ->assertJsonFragment([
                'config_json' => json_encode(['enable_feature_x' => true, 'theme' => 'dark'])
            ]);
    }



    /** @test */
    public function it_returns_404_for_non_existing_tenant()
    {
        $response = $this->getJson('/api/tenants/999');

        $response->assertStatus(404)
            ->assertJson(['error' => 'Tenant not found']);
    }

    /** @test */
    public function testTenantCreation()
    {
        // Yangi tenant yaratish
        $tenant = Tenant::factory()->create();

        // Tenant borligini tekshirish
        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
        ]);
    }
}
