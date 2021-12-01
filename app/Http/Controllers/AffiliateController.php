<?php

namespace App\Http\Controllers;

use App\Models\AffiliateTransaction;
use App\Models\User;
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
        $user = Auth::user();
        $myreferal = $user->referalCode;
        $verifiedCount = User::where("referrer_id",$user->id)->count();
        $activeCount = AffiliateTransaction::where("referrer_id",$user->id)->count();
        $transactions = AffiliateTransaction::with("user","referrer")->where("referrer_id",$user->id)->get();
        $paidOut = AffiliateTransaction::where("status","Paid")->where("referrer_id",$user->id)->sum("amount");
        $pendingAmount = AffiliateTransaction::where("status","Pending")->where("referrer_id",$user->id)->sum("amount");
        return view(
            'Affilialiate_Dashboard.myAffiliate_dashboard',
            compact(
                'myreferal',
                'verifiedCount',
                'activeCount',
                'transactions',
                'paidOut',
                'pendingAmount'
            ));
    }
}
