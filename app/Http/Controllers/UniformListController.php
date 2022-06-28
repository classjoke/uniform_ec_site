<?php

namespace App\Http\Controllers;

use App\Models\Uniform;
use Illuminate\Http\Request;

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
}
