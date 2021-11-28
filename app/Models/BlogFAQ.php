<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogFAQ extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id','ques','ans'];
    public function blogs()
    {
        return $this->belongsTo(Blog::class);
    }
    
}
