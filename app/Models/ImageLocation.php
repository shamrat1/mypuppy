<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageLocation extends Model
{
    use HasFactory;
    protected $fillable = ['image_path','key'];
}
