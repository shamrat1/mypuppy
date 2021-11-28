<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $fillable = ['company_logo','who_we_are','why_choose_us','strategy',
                            'culture_values','company_photo'];
 
}
