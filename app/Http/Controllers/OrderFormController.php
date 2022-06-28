<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Uniform;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Validator;

class OrderFormController extends Controller
{
    // 初期画面用アクション
    public function index(Request $request) {
        // 画像情報取得
        $uniform = Uniform::all();

        if($request->session()->has('userInfo')){
            $user_id = $request->session()->get('userInfo')->id;
            $user =  User::find($user_id);

            return view('order_form', ['user' => $user,'uniformList'=>$uniform]);
        }else{
            return view('order_form', ['uniformList' => $uniform]);
        }
    }
    
    
    // 登録用コントローラ
    public function insert(Request $request){
        $form = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'uniform_id' => 'required',
            'quantity' => 'required | min:1'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('error' , '入力値が不足しています。')->withInput();
        }

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
        
        $uniform = Uniform::find($form['uniform_id']);

        //表示に必要な値を補完
        $form['id'] = $order_data['id'];
        $form['uniform_name'] = $uniform->name;
        $form['total_price'] = $uniform->price * $form['quantity'];
        
        //注文したらメールを送信
        Mail::send(new OrderMail($form));

        // 在庫数現象処理
        $uniform->stock -= $form['quantity'];
        $uniform->save();

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
