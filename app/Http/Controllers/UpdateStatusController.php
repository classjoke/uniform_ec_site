<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentMail;
use App\Mail\ShippingMail;

class UpdateStatusController extends Controller
{
    public function payment(Request $request) {
        
        $order = Order::find($request->id);
        
        Mail::send(new PaymentMail($order));

        // 入金済みに設定
        $order->payment_status = 1;
        $order->save();
    }

    public function shipping(Request $request) {
        $order = Order::find($request->id);

        Mail::send(new ShippingMail($order));

        // 発送済みに設定
        $order->shipping_status = 1;
        $order->save();
    }
}
