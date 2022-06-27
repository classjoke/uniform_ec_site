<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Uniform;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class OrderFormController extends Controller
{
    // 初期画面用アクション
    public function index(Request $request) {
        if($request->session()->has('userInfo')){
            $user_id = $request->session()->get('userInfo')->id;
            $name = User::find($user_id)->name;
            $email = User::find($user_id)->email;
            $address = User::find($user_id)->address;
            return view('order_form', ['name'=>$name, 'email'=>$email, 'address'=>$address]);
        }else{
            $name = "";
            $email = "";
            $address = "";
            return view('order_form', ['name'=>$name, 'email'=>$email, 'address'=>$address]);
        }
    }
    
    // 登録用コントローラ
    public function insert(Request $request){
        $form = $request->all();
        unset($form['_token']);
        if ($request->session()->has('user_id')) {
            //ログインしている場合
            $user_id = $request->session()->get('user_id');
        }else{
            //ログインしていない場合
            $user_id = OrderFormController::create_guest_user($form);
        }
        $form['user_id'] = $user_id;
        $form['payment_status'] = "0";
        $form['shipping_status'] = "0";
        $form['order_date'] = date('Y-m-d');
        $order_data = Order::create($form);
        
        //表示に必要な値を補完
        $form['id'] = $order_data['id'];
        $form['uniform_name'] = Uniform::find($form['uniform_id'])->name;
        $form['total_price'] = (Uniform::find($form['uniform_id'])->price) * $form['quantity'];
        
        //注文したらメールを送信
        Mail::send(new OrderMail($form));
        
        return view('order_confirm', ['data'=>$form]);
    }
    
    
    private static function create_guest_user($form){
        $user_data = [];
        $user_data['name'] = $form['name'];
        $user_data['email'] = $form['email'];
        $user_data['password'] = NULL;
        $user_data['authority'] = '2';
        $user_data['address'] = $form['address'];
        $user_data['login_id'] = NULL;
        $data = User::create($user_data);
        return $data->id;
    }
}
