<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormIngreso;
use Illuminate\Support\Facades\Auth;

class logInController extends Controller
{
    public function authenticate(FormIngreso $request){

        if (Auth::attempt(['key'=>$request->Codigo, 'password' => $request->NIP],$request->recordar == 'on' ?true:false)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return back()->withErrors([
            'Codigo' => 'The provided credentials do not match our records.',
        ]);
        
    }

    public function logOut(){
        
    }

    public function index()
    {
        return view('ingreso');
    }
}
