<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormIngreso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class logInController extends Controller
{
    public function authenticate(FormIngreso $request)
    {

        $credentials = [
            'id' => $request->Codigo,
            'password' => $request->NIP
        ];
        /* dd(Auth::attempt($credentials, $request->recordar == 'on' ? true : false)); */
        if (Auth::attempt($credentials, $request->recordar == 'on' ? true : false)) {
            $request->session()->regenerate();
            return redirect()->route('main');
        }

        return back()->withErrors([
            'key' => 'The provided credentials do not match our records.',
            'password' => 'contraseña'
        ]);
    }

    public function logOut()
    {
    }

    public function index()
    {
        return view('ingreso');
    }
}
