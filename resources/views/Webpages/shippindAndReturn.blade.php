@extends('layouts.myApp')
@section('content')
<style>
    h4::before {
        content: "●	";
      }
</style>
<div class="breadcrumbs">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
            <li><a href="javascript:void(0)">Shipping and Return</a></li>
         </ul>
</div>

<div class="container">
    <h1>Shipping & Return</h1>
    <h3>Shipping</h3>
    <h4>How much does shipping cost?</h4>
    <p>If you don't happen to qualify for free shipping, the cost of shipping will depend on the weight of your order. You'll be able to see this on the checkout page before you proceed to payment.</p>
    <p>We offer %50 shipping if you order $200 worth product.</p>
    <p>Please be aware that further charges may apply if clear delivery instructions are not provided and our courier company is required to make an additional delivery attempt.</p>
    <h4>How long does shipping take?</h4>
    <p>In-stock items ordered before 10am on a weekday are dispatched on the same day, or within 24 hours if ordered after 10am. We ship all orders from our warehouse in Melbourne. Most metro areas of major cities, you can expect your order within 2-4 business days. Outside of these areas, you should receive your order any time from five days after the time of dispatch.</p>
    <p>If you haven't received an update email with your tracking number two business days after you placed an order, please check your email and junk mail as we may have sent you email regarding postage or stock.</p>
    <p>If you need the order urgently, please contact us ASAP, and we will see if there is anything we can do.</p>
    <p>Please note, Couriers Please is one of our main courier company, if the delivery address was unattended at delivery attempt, they will leave a card for you to collect your parcel at the nearest pick-up point. If you do not wish this to happen, please give authority to leave at checkout.</p>
    <h4>Out of Stock/Delays</h4>
    <p>If we’re unable to supply what you’ve ordered, we will contact you to advise. You can then choose to wait, change what you’ve ordered or you may simply cancel your order.</p>
    <p>What happens if my order does not arrive in the estimated time frame? Please feel free to contact the courier company directly with your tracking number or contact us on admin@mypuppymypet.com.au</p>
    <h4>Do you deliver outside of Australia?</h4>
    <p>We can ship to virtually any address in Australia, but for address outside of Australia, please Contact Us directly.</p>
    <p>Returns Policy You may return most new, unopened items within 14 days of delivery for a refund, if you have paid postage for your order. One we receive the product we will cheek the if the product not use, we will send you a full refund, if you used already, we will refund %50 from your shopping cost. however, if we offered free shipping for your order, your refunded amount will have the shipping cost deducted. We'll reimburse the cost of return shipping (Standard shipping) if the return is a result of our error (you received an incorrect or defective item, etc.). You should expect to receive your refund within 14 days from the date we received the returned item(s).</p>
    <p>If you need to return an item, please Contact Us with your order number and details about the product you would like to return. We will respond in a timely manner with instructions on how to return item(s) from your order.</p>
    <h3>Exchange policy</h3>
    <p>If you wish to return an unopened and unused item, and exchange it to a different color or size, you will need to contact us contact us on admin@mypuppymypet.com.au to check if we have the item you want in stock, and you will be responsible for the return postage and postage for the second delivery.</p>
    <h4>What do I do if I have been sent the wrong item?</h4>
    <p>All the parcels are carefully packed by our delivery team and then double checked but in the unlikely event you end up with a different item email us on admin@mypuppymypet.com.au Leave the parcel in the exact condition it arrived and post it back to us or we will arrange for collection with our courier. We will send you a new item immediately.</p>
    <h4>Faulty products</h4>
    <p>If our product is faulty from workmanship or materials, please let us know. We will need to evaluate the product to ensure that it is faulty and not damaged through wear and tear. Please contact our Customer Service Team to log your faulty product claim and send us as much information as you can. The more details the better (photos are great!) so that we can determine what has gone wrong and ensure it doesn't reoccur. If an item is deemed to be faulty we may repair or replace depending on the situation.</p>
</div>
@endsection