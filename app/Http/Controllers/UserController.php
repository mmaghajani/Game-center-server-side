<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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

    public function uploadPhoto()
    {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('profile')->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
                $user = Auth::user();

                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                $user->avatar = '/' . $destinationPath . '/' . $fileName ;
                $user->save();
                // sending back with message
                Session::flash('success', 'Upload successfully');
                return Redirect::to('profile');
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to('profile');
            }
        }

    }
}
