<?php
namespace App\Http\Controllers;

use App\Services\TenantService;
use Symfony\Component\HttpFoundation\Response;

class TenantController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function show($id)
    {
        $tenant = $this->tenantService->getTenantById($id);

        if (!$tenant) {
            return response()->json(['error' => 'Tenant not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'id' => $tenant->id,
            'name' => $tenant->name,
            'domain' => $tenant->domain,
            'config_json' => $tenant->config_json,  // config_jsonni PHP massiv sifatida olish
            'created_at' => $tenant->created_at,
            'updated_at' => $tenant->updated_at,
        ]);
    }
}
