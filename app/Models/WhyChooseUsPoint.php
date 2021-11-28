<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUsPoint extends Model
{
    use HasFactory;
    protected $fillable = ['point1','point2','point3','point4','point5','point6'];
}
