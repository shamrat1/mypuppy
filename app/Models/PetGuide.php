<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetGuide extends Model
{
    use HasFactory;
    protected $fillable = ['petGuide_name','image_path'];
}
