<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function profile(Request $request){
        return view('main.pages.profile');
    }

    public function docs(Request $request){
        return view('main.pages.docs');
    }
}
