<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'timing',
        'servLocation_id',
    ];
    public function serviceLocations()
    {
        return $this->belongsTo(ServiceLocation::class);
    }
}
