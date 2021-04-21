<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logInController extends Controller
{
    public function authenticate(Request $request){
        $request->validate([
            'Codigo' => 'required|min:5|max:9',
            'NIP' => 'required'
        ]);
        if (Auth::loginUsingId($request->Codigo,$request->recordar == 'on' ?true:false)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }
        return back()->withErrors([
            'Codigo' => 'The provided credentials do not match our records.',
        ]);
    }
}
