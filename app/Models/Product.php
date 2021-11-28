<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'tagname',
        'category',
        'subcategory',
        'subcategory_type',
        'product_type',
        'image_path',
        'description',
        'weightname1',
        'weightname2',
        'weightname3',
        'weightname4',
        'weightname5',
        'price1_weight',
        'price2_weight',
        'price3_weight',
        'price4_weight',
        'price5_weight',
        'stock1',
        'status1',
        'stock2',
        'status2',
        'stock3',
        'status3',
        'stock4',
        'status4',
        'stock5',
        'status5',
        'image_path1',
        'image_path2',
        'image_path3',
        'size_measure',
        'one_size',
        'dimension_name1',
        'dimension_name2',
        'dimension_name3',
        'dimension_name4',
        'dimension_name5',
        'dimension_name1Small',
        'dimension_name2Small',
        'dimension_name3Small',
        'dimension_name4Small',
        'dimension_name5Small',
        'dimension_name1Medium',
        'dimension_name2Medium',
        'dimension_name3Medium',
        'dimension_name4Medium',
        'dimension_name5Medium',
        'dimension_name1Large',
        'dimension_name2Large',
        'dimension_name3Large',
        'dimension_name4Large',
        'dimension_name5Large',
        'dimension_name1XLarge',
        'dimension_name2XLarge',
        'dimension_name3XLarge',
        'dimension_name4XLarge',
        'dimension_name5XLarge',
        'dimension_name1XXLarge',
        'dimension_name2XXLarge',
        'dimension_name3XXLarge',
        'dimension_name4XXLarge',
        'dimension_name5XXLarge',
        'medium',
        'large',
        'extra_large',
        'double_x_large',
        'size_desc',
        'instructions',
        'material',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function sale()
    // {
    //     return $this->hasOne('Sale::class');
    // }
}
