<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProd extends Model
{
    use HasFactory;
    protected $fillable = [
        'new_id',
        'status'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
