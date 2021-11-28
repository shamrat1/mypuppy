<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerImage;

class AdminWebPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function BannerImg()
    {
        return view('Admin_Webpages.BannerImages');
    }
   
}
