<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    use HasFactory;
    public $fillable=['blogtype_name','image_path'];
    public function resourcecenters(){
        return $this->hasMany(ResourceCenter::class);
    }
}
