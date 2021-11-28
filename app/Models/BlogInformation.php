<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogInformation extends Model
{
    use HasFactory;
    public $fillable=['resource_center_id','content','image_path','imgCssClass'];
    public function resouceCenters()
    {
        return $this->belongsTo(ResourceCenter::class);
    }
}
