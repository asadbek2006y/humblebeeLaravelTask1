<?php
// tests/Unit/TenantTest.php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\TenantService;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TenantServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_tenant_when_exists()
    {
        $tenant = Tenant::factory()->create();

        $tenantService = new TenantService();
        $result = $tenantService->getTenantById($tenant->id);

        $this->assertEquals($tenant->id, $result->id);
    }

    /** @test */
    public function it_returns_null_when_tenant_not_found()
    {
        $tenantService = new TenantService();
        $result = $tenantService->getTenantById(999);

        $this->assertNull($result);
    }
}
