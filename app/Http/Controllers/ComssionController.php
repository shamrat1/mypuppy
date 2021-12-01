<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AffiliateTransaction;
use Illuminate\Http\Request;
use App\Models\User;

class ComssionController extends Controller
{
    
    static function giveCommission($receiverID, $totalOrderAmount, $senderID){
        if($receiverID != null && $senderID != null){
            $receiver = User::find($receiverID);
            $sender = User::find($senderID);
            if($receiver != null && $sender != null){
                // check if comission is already given for certain number of time, in this case one
                if($sender->given_commission_count < 1){
                    $receiver->credit += round($totalOrderAmount * 0.05);
                    $receiver->update();
                    $sender->given_commission_count += 1;
                    $sender->update();

                    // create transaction record
                    AffiliateTransaction::create([
                        "user_id" => $senderID,
                        "referrer_id" => $receiverID,
                        "amount" => round($totalOrderAmount * 0.05),
                        "status" => "Pending"
                    ]);
                }
            }
        }

    }
}
