<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Favourite extends Model
{
    use HasFactory;
    protected $fillable = [
        'fav_id',
        'favourite',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
