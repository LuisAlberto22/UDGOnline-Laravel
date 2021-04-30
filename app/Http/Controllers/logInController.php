<?php

namespace App\Http\Controllers;

use App\Helpers\UDGOnline;
use App\Http\Requests\FormIngreso;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
                $user = User::where('key' ,$credentials['key'])->first();
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

    public function logOut()
    {

    }

    public function index()
    {
        return view('ingreso');
    }
}
