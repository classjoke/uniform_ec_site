<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderDetailController extends Controller
{
    public function index(Request $request){
        $orderDetail = Order::find($request->id);
        if(empty($orderDetail)){
            return redirect()->route('order.list');
        }
        return view('order_detail',['orderDetail' => $orderDetail]);
    }
}
