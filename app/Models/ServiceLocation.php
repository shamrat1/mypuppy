<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_name',
        'user_id',
        'address',
        'phone',
        'pincode',
        'state_id',
        'city_id',
        'suburb_id'
    ];
    public function cities()
    {
        return $this->belongsTo(City::class);
    }
}
