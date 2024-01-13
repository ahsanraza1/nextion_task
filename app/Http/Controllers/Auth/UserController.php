<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $user->sendEmailVerificationNotification();

    return response()->json(['message' => 'Registration successful. Please check your email for verification.']);
}


public function verifyEmail(Request $request)
    {
        $user = User::findOrFail($request->route('id'));

        if ($user->hasVerifiedEmail()) {
            // dd('alr');
            return redirect('/login')->with('status', 'Email already verified');
        }

        if ($user->markEmailAsVerified()) {
            event(new \Illuminate\Auth\Events\Verified($request->user()));
            // dd('good');
            return redirect('/login')->with('status', 'Email verified successfully');
        }
        // dd('inv');
        return redirect('/login')->with('status', 'Invalid verification token');
    }

    public function updateProfile( UpdateProfileRequest $request ){
        $user = auth()->user();

        // $user->update(
            $data = [
                'name'=>$request->input('name'),
                'password'=> ($request->input('new_password'))?Hash::make( $request->input('new_password') ):$user->password,
                // 'gh'=>($request->input('new_password'))?'yes '.$user->password:'no '.$user->password
            ];
            try{
            $user->update($data);
            return redirect()->route('profile');
            }catch( Exception $e){
                dd( $e->getMessage());
            }


        // );
    }

}