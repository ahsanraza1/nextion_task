<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        
        if( auth()->user()){
            return redirect('/');
        }
        return view('auth.register');
    }

    public function store(UserRegisterRequest $request){

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_token' => Str::uuid(),
        ]);
        
        // Auth::login($user);
        event(new Registered($user));
        // $user->sendEmailVerificationNotification();
    
        // return response()->json(['message' => 'Registration successful. Please check your email for verification.']);
        return redirect()->route('login.index');
        return 'Registration successful. Please check your email for verification.';

    }
}
