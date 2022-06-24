<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrderDetailController extends Controller
{
    //
    public function index(){
        $orderDetail = Order::find(1);
        return view('order_detail',['orderDetail' => $orderDetail]);
    }
}
