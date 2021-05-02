<?php

namespace App\Http\Controllers;

use App\Helpers\UDGOnline;
use App\Http\Requests\FormIngreso;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logInController extends Controller
{
    public function authenticate(Request $request)
    {

        $request->validate([
            'Codigo' => 'required',
            'NIP' => 'required'
        ]);
        $credentials = [
            'key' => $request->Codigo,
            'password' => $request->NIP
        ];
        /*   try{  */
        if (UDGOnline::auth($credentials)) {
            $user = User::where('key', $credentials['key'])->first();
            if ($user == null) {
                $user = UDGOnline::createUser($credentials);
                UDGOnline::storeClasses($user);
            }
            if (Auth::loginUsingId($user->id, $request->recordar == 'on' ? true : false)) {
                $request->session()->regenerate();
                return redirect()->route('main');
            }
        }
        /*  }catch(Exception $e){
            return back()->withErrors([
                'Error' => 'Error al leer los datos',
            ]);
        } */
        return back()->withErrors([
            'key' => 'Codigo y/o NIP incorrecto',
            'password' => 'Codigo y/o NIP incorrecto'
        ]);
    }

    public function logOut(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        return view('ingreso');
    }
}
