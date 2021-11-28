<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetDetail extends Model
{
    use HasFactory;
    protected $fillable = [
    'pet_name',
    'animal_type_id',
    'animal_breed_id',
    'gender',
    'size',
    'colour_id',
    'age',
    'servLocation_id',
    'about_animal',
    'image_path',
    'image_path1',
    'image_path2',
    'image_path3',
    ];
}
