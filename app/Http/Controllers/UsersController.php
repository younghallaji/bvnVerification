<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function userRegistration(Request $request){
        $validateData = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => [
                                'required',
                                'confirmed',
                                Password::min(8)
                                ->mixedCase()
                                ->letters()
                                ->numbers()
                                ->symbols()
                                ->uncompromised(),
                            ],
            ]);
        if ($validateData->fails()) {
            return redirect()->back()->withErrors($validateData)->withInput();
        } 
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect('/')->with('success', 'Registration successful!');
    }

    public function home(){
        return view('index');
    }

    public function index(){
        return view('register');
    }
}
