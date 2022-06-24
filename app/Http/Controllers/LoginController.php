<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request) {
        // ユーザー情報を登録
        $user = User::where('login_id', '=', $request->login_id)
            ->where('password', '=', $request->password)->first();
        
        // セッションにUserInfoとして保存
        $request->session()->put('userInfo',$user);
        
        // 管理者だった場合
        if ($user->authority == 0) {
            return redirect()->route('order.list');

        // 一般ユーザーの場合
        } else if ($user->authority == 1) {
            return redirect()->route('order.form');
        }
    }
}
