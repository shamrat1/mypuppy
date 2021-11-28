<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_name',
        'image_path',
    ];
    public function serviceContent(){
        return $this->hasMany(ServiceContent::class);
    }
}
