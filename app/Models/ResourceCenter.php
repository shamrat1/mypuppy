<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceCenter extends Model
{
    use HasFactory;
    public $fillable=['blog_id','blogtype_id','title','shortDescription','heading','image_path','status'];
  
    public function blogInformations(){
        return $this->hasMany(BlogInformation::class);
    }
    public function blogs(){
        return $this->belongsTo(Blog::class);
    }
    public function blogTypes(){
        return $this->belongsTo(BlogType::class);
    }
}
