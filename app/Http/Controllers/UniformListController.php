<?php

namespace App\Http\Controllers;

use App\Models\Uniform;
use Illuminate\Http\Request;
use Validator;

class UniformListController extends Controller
{
    public function index(Request $request){
        if(!$request->session()->has('userInfo')){
            return redirect()->route('login');
        }
        if($request->session()->get('userInfo')->authority !== 0){
            return redirect()->route('order.form');
        }
        $uniformList = Uniform::withTrashed()->get();
        return view('uniform_list', ['uniformList' => $uniformList]);
    
    }
    
    public function update(Request $request){
        $form = $request->all();
        
        $validator = Validator::make($request->all(), [
            'uniform_id' => 'required',
            'uniform_name' => 'required',
            'uniform_price' => 'required',
            'uniform_stock' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('error' , '入力値が不足しています。')->withInput();
        }
        $uniform = Uniform::find($request->uniform_id);
        $uniform->price = $request->uniform_price;
        $uniform->name = $request->uniform_name;
        $uniform->stock = $request->uniform_stock;
        $uniform->save();
        return redirect()->route('uniform.list');
    }
}
