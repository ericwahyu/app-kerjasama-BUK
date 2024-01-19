<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function viewLogin()
    {
        return view('login');
    }

    public function registrasi(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        // unique username
        // $username = Str::lower($request->username);
        // $uniqueUsername = User::whereUsername($username)->first();
        // if($uniqueUsername){
        //     Session::flash('message', "Username sudah ada di Database!");
        //     return Redirect::back()->withInput();
        // }

        // // unique username
        // $email = Str::lower($request->email);
        // $uniqueEmail = User::whereEmail($email)->first();
        // if($uniqueEmail){
        //     Session::flash('message', "Email sudah ada di Database!");
        //     return redirect()->back()->withInput();
        // }

        // $insertUser = new User();
        // $insertUser->role_id = 2;
        // $insertUser->name = Str::upper($request->name);
        // $insertUser->username = $username;
        // $insertUser->email = $email;
        // $insertUser->password = Hash::make($request->password);
        // $insertUser->save();

        // return redirect()->route('view.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login'    => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('login')
        ]);

        if (Auth::attempt($request->only($login_type, 'password'))) {
            return redirect()->route('dashboard')->with('success', 'Berhasil login !!');
        }

        return redirect()->back()->with('error', 'Gagal login !!');
    }
}
