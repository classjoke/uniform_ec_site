<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRegisterController extends Controller
{
    public function register(Request $request) {

        $user = new User();
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'authority' => 1,
            'address' => $request->address,
            'login_id' => $request->login_id,
        ]);

        $user->save();
        return view('login');
    }
}
