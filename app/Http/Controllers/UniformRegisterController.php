<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uniform;

class UniformRegisterController extends Controller
{
    public function index(){
        return view('uniform_register');
    }

    // 商品登録処理
    public function register(Request $request){
       //画像保存処理
       if ($file = $request->image) {

        // 画像の取得,アップロードフォルダまでの絶対パスの取得,画像の保存
        $fileName = $file->getClientOriginalName();
        $target_path = public_path('uploads/');
        $file->move($target_path,$fileName);

       } else {
        $fileName = "";

       }

       // DBに保存
        $uniform = new Uniform();
        $uniform->create([
            'name' => $request -> name,
            'price'=> $request ->price,
            'stock'=>$request->stock,
            'image_path'=>$fileName,
        ]);

       return redirect()->route('order.list');

    }
}
