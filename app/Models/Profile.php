<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['city','state','address','phone','addrOpt','user_id','zip'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
