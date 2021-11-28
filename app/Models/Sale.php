<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'discount',
        'sale'
        
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
