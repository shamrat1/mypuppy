<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use ComssionController;

class PolipayController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function paywithpolipay(Request $request)
    {
        // require('ca-bundle.crt');
        // dd($request->name);
        $productDetails = [];
        $totalPrice = 0;
        foreach ($request->name as $key => $value) {
           $product = [
                $value => [
                    "Quantity" => $request->quantity[$key],
                    "Price" => $request->price[$key]
                ]
            ];
            
            
        $totalPrice +=$request->price[$key];
        array_push($productDetails,$product);
        }
       
        //dd($productDetails,$superTotal);
        
        $json_builder = '{
            "Amount": "'.$totalPrice.'",
            "CurrencyCode":"AUD",
            "MerchantReference":"CustomerRef12345",
            "MerchantHomepageURL":"https://mypuppymypet.demo-meritzeal2.com",
            "SuccessURL":"https://mypuppymypet.demo-meritzeal2.com/Success",
            "FailureURL":"https://mypuppymypet.demo-meritzeal2.com/Failure",
            "CancellationURL":"https://mypuppymypet.demo-meritzeal2.com/Cancelled",
            "NotificationURL":"https://mypuppymypet.demo-meritzeal2.com/nudge"  
        }';
         
        $auth = base64_encode('S6105737:P@n6cW8$2!Y');
        $header = array();
        $header[] = 'Content-Type: application/json';
        $header[] = 'Authorization: Basic '.$auth;
         
        $ch = curl_init("https://poliapi.apac.paywithpoli.com/api/v2/Transaction/Initiate");
        //See the cURL documentation for more information: http://curl.haxx.se/docs/sslcerts.html
        //We recommend using this bundle: https://raw.githubusercontent.com/bagder/ca-bundle/master/ca-bundle.crt
        curl_setopt( $ch, CURLOPT_CAINFO, "ca-bundle.crt");
        curl_setopt( $ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_builder);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec( $ch );
        curl_close ($ch);
         
        $user = Auth::user();
        // payment successful
        ComssionController::giveCommission($user->referrer_id,$amount, $user->id);

        $json = json_decode($response, true);
        // header('Location: '.$json["NavigateURL"]);
        return Redirect::to($json["NavigateURL"]);
       
    }
    
     public function cancelPolipay()
    {
        return view('Payment.cancelPaypal');
    }
}
