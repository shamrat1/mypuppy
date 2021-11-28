<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AffiliateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function myAffiliate()
    {
        $myreferal=Auth::user()->referalCode;
        return view('Affilialiate_Dashboard.myAffiliate_dashboard',compact('myreferal'));
    }
}
