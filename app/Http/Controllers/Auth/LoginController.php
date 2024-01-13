<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if( auth()->user()){
            return redirect('/');
        }
        return view('auth.login');
    }
    
    public function store(UserLoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/'); // Redirect to the desired location after login
        }
        // dd("tried");
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
