<?php


namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use  PayPal\Auth\OAuthTokenCredential;
use PayPal\Common\PayPalModel;
use Paypal\Rest\ApiContext;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Redirect;
use Session;
use URL;



class PaypalController extends Controller
{

    private $_api_context;
    public function __construct()
    {
      $this->middleware('auth');


    }

    public function paywithpaypal(Request $request)
    {
//        return $request;
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),     // ClientID
                env('PAYPAL_SECRET')      // ClientSecret
            ));
        $apiContext->setConfig(
            array(
                'mode' => 'live',
            )
        );
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $data = $request->all();
//        return $data;
        $i =0;
        foreach($request->name as $key=>$value)
        {
            $items[$i] = new Item();
            $items[$i]->setQuantity((int)$request->quantity[$key])->setName($value)->setPrice($request->price[$key])->setCurrency('AUD');
            $i++;
        }

        $itemList = new ItemList();
        $itemList->setItems($items);
        //create order for our record

        $order=new Order();
        $order->total_amount=$request->total;
        $order->tax=$request->tax;
        $order->shipping=$request->shipping;
        $order->user_id=Auth::id();
        $order->save();
        session()->put('order_id',$order->id);
        //create order ends here
        //create order items for our record
        foreach($request->name as $key=>$value)
        {
            $orderitem=new OrderItems();
            $orderitem->name=$value;
            $orderitem->quantity=(int)$request->quantity[$key];
            $orderitem->price=$request->price[$key];
            $orderitem->order_id=$order->id;
            $orderitem->save();
        }
        //create order item ends here
        $subtotal=$request->total-$request->tax-$request->shipping;
        $details = new Details();
        $details->setShipping($request->shipping)
            ->setTax($request->tax)
            ->setSubtotal($subtotal);

        $amount = new Amount();
        $amount->setCurrency("AUD")->setTotal((float)$request->total)->setDetails($details);;

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());


            $processUrl = url("/process-paypal");
            $cancelURl = url("/cancel-paypal");
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl("$processUrl")
                        ->setCancelUrl("$cancelURl");

            $payment = new Payment();
            $payment->setIntent("authorize")
                ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

            //dd($payment);
            $approvalUrl = $payment->getApprovalLink();

            //execute paypal


            //execute paypal
            //create payment with valid API Context
            try {
                $payment->create($apiContext);
                //Get Paypal redirect URL and redirect the customer

                $approveUrl = $payment->getApprovalLink();
                session()->put('paypal_payment_id',$payment->getId());
                session()->forget('cart');
                return redirect($approveUrl);
                //return view('paywithpaypal',compact('payment'));
            //Redirect the customer to $approvalUrl
            }
            catch (\Paypal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            }
            catch (\Exception $ex) {
                die($ex);
            }






	if(isset($redirect_url))
	{
		/** Redirect to paypal **/
	    return view('Payment.paywithpaypal',compact('payment'));
	}



            return view('Payment.paywithpaypal',compact('payment'));
    }





    public function processPaypal(Request $request)
{

	  $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
             env('PAYPAL_CLIENT_ID'),     // ClientID
                env('PAYPAL_SECRET')      // ClientSecret
            ));
	//Get Payment object by passing PaymentId
	$paymentId= $request->paymentId;
	$payment = Payment::get($paymentId, $apiContext);
	$payerId = $request->PayerID;

	//Execute payment with payer ID.
	$execution = new PaymentExecution();
	$execution->setPayerId($payerId);

	try {
		//Execute Payment
		$result = $payment->execute($execution, $apiContext);
		// var_dump($result);


        if(isset($result) and strtolower($result->state) == 'approved')
        {
            $user_id = $result->payer->payer_info->payer_id;
            //store the payment for the order in database
            $paymentz=new \App\Models\Payment();
            $paymentz->token=$result->id;
            $paymentz->status=$result->state;
            $paymentz->payment=$result->transactions[0]->amount->total;
            $paymentz->order_id=\Session::get('order_id');
            $paymentz->save();
            //store payment ends here

        }
	}
	catch(\PayPal\Exception\PayPalConnectionException $ex) {
		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	}
	catch(\Exception $ex){
		die($ex);
	}
	return view('Payment.paywithpaypal',compact('paymentz','result'));
}

    public function cancelPaypal()
    {
        return view('Payment.cancelPaypal');
    }
}
