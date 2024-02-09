<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function viewLogin()
    {
        return view('login');
    }

    public function viewRegister()
    {
        return view('registrasi');
    }

    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'name'      => 'required',
            'username'  => 'required|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required'
        ]);

        $insertUser           = new User();
        $insertUser->name     = Str::upper($request->name);
        $insertUser->username = Str::lower($request->username);
        $insertUser->email    = Str::lower($request->email);
        $insertUser->password = Hash::make($request->password);
        $insertUser->save();

        $insertUser->assignRole('user');

        return redirect()->route('view.login');
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

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect()->route('view.login');
    }
}
