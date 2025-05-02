<?php

namespace Database\Seeders;

use App\Models\Tenant; // Tenant modelini import qilish
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    public function run()
    {
        Tenant::factory()->count(10)->create();
    }
}

