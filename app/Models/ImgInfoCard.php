<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImgInfoCard extends Model
{
    use HasFactory;
    protected $fillable = ['image_path','info','service_id'];
}
