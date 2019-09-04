<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;

class PayOrderController extends Controller
{
    public function order(OrderDetails $orderDetails, PaymentGatewayContract $paymentGateway)
    {   
        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }
}
