<?php

namespace App\Http\Controllers;

use App\Helpers\AuthUDG;
use App\Helpers\UDGOnline;
use App\Http\Requests\FormIngreso;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class logInController extends Controller
{
    public function authenticate(FormIngreso $request)
    {

        $credentials = [
            'key' => $request->Codigo,
            'password' => $request->NIP
        ];  
      /*   try{  */
            if (UDGOnline::auth($credentials)) {
                UDGOnline::createUser($credentials);
                if (Auth::attempt($credentials, $request->recordar == 'on' ? true : false)) {
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

    public function logOut()
    {

    }

    public function index()
    {
        return view('ingreso');
    }
}
