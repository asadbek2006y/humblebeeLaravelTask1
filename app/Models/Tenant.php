<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Buni qo'shing
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;  // Bu qatorni qo'shish

    protected $fillable = ['name', 'domain', 'config_json'];

    // config_json accessor
    public function getConfigJsonAttribute($value)
    {
        return json_decode($value, true);
    }

    
    // config_json mutator
    public function setConfigJsonAttribute($value)
    {
        $this->attributes['config_json'] = json_encode($value);
    }
}
