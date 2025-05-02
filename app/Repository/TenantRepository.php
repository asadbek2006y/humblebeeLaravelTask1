<?php
namespace App\Repositories;

use App\Models\Tenant;

class TenantRepository
{
    public function findById(int $id): ?Tenant
    {
        return Tenant::find($id);
    }
}
