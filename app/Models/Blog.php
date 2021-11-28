<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['blog_name','image_path','image_path1','blog_description'];
    public function faqs(){
        return $this->hasMany(BlogFAQ::class);
    }
    public function resourcecenters(){
        return $this->hasMany(ResourceCenter::class);
    }
}
