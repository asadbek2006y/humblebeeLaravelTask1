<?php

namespace App\Services;

use App\Models\Tenant;

class TenantService
{
    public function getTenantById($id)
    {
        return Tenant::find($id);
    }
}
