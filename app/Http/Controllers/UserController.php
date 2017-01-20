<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function changeInfo(Request $request)
    {
        $input = $request->all();
        $user = User::all()->where('email', '=', $input['email'])->pop();

        $user->name = $input['name'];
        $user->password = bcrypt($input['password']);
        $user->remember_token = Str::random(60);

        $user->save();

        return redirect('/home');
    }

    public function changeCat(Request $request)
    {
        $input = $request->all();
        $input = collect($input);
        $input = $input->keys();
        $s = collect();
        foreach ($input as $category) {
            $categoryRecord = Category::all()->where('title', '=', $category);

            if (!$categoryRecord->isEmpty()) {
                $categoryRecord = $categoryRecord->pop();
                $s->push($categoryRecord->id);
            }
        }

        $user = Auth::user();
        $user->favoriteCategories()->sync($s->toArray());

        return redirect('/home');
    }
}
