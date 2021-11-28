<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoryType extends Model
{
    use HasFactory;
    protected $fillable = ['subcategory_id','subcategory_type','slug'];
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function product_types(){
        return $this->hasMany(ProductType::class);
    }
}
