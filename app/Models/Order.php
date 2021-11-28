<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['total_amount','tax','shipping','user_id','delivery_status'];
    public function orderitems(){
        return $this->hasMany(OrderItems::class);
    }
}
