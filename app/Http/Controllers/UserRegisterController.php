<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserRegisterController extends Controller
{
    public function register(Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required',
            'address' => 'required',
            'login_id' => 'required | unique:users',
        ]);

        if($validator->fails()) {
            return redirect()->back()->with('error', "そのログインIDは既に使われています")->withInput();
        }
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
