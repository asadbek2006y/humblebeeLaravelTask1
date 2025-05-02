<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('api/tenants/{id}', [TenantController::class, 'show']);
