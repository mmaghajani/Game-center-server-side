<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function changeInfo(Request $request){
        $input = $request->all();
        $user = User::all()->where('email' , '=' , $input['email'])->pop();

        $user->name = $input['name'];
        $user->password = bcrypt($input['password']);
        $user->remember_token = Str::random(60);

        $user->save();

        return redirect('/home');
    }
}
