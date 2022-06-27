<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Uniform;
use Illuminate\Http\Request;

class OrderListController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->has('userInfo')){
            return redirect()->route('login');
        }
        if($request->session()->get('userInfo')->authority !== 0){
            return redirect()->route('order.form');
        }

        $orderList = Order::with('user')->get();
        $uniformList = Uniform::all();
        return view('order_list', ['orderList' => $orderList, 'uniformList' => $uniformList]);
    
    }

    public function delete(Request $request){
        $uniform = Uniform::destroy($request->id);
    }
}
