<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['subcategoryname','slug'];
    public function SubCategory_types(){
        return $this->hasMany(SubCategoryType::class);
    }
}
