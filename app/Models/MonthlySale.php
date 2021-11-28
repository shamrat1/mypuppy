<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlySale extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'month_name',
        'discount',
        'monthlysale'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
