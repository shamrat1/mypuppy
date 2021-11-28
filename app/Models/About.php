<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
            'paragraph_1',
            'paragraph_2',
            'paragraph_3',
            'bannerimage',
            'sidebannerimage',
            'sidebarpoint1',
            'sidebarpoint2',
            'sidebarpoint3',
            'collectiondata_1',
            'collectiondata_2',
            'collectiondata_3',
            'collectiondata_4',
            'collectionimg_1',
            'collectionimg_2',
            'collectionimg_3',
            'collectionimg_4',
        ];
}
