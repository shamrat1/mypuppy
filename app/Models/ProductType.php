<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = ['subcategoryType_id','product_type','slug'];
    
    public function subcategorytype()
    {
        return $this->belongsTo(SubCategoryType::class);
    }
    
}
