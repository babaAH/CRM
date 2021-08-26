<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth extends Controller
{
    public function loginView()
    {
        $user = Auth::user();

        if(!$user){
            return view("admin.login");
        }

        return redirect()->route("dashboard");
    }

    public function login(AdminLoginRequest $request)
    {
        if(Auth::attempt(["email" => $request->email, "password" => $request->password])){
            $request->session()->regenerate();

            return redirect()->route("dashboard");
        }

        return back()->withErrors([
            "message" => "Пользователь не найден",
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login-form');
    }
}
