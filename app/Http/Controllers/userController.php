<?php

namespace App\Http\Controllers;

use App\Http\Requests\user as RequestsUser;

class userController extends Controller
{

    public function index()
    {
        $lessons=auth()
                ->user()
                ->Lessons()
                ->get();
        return view('usuario.perfil', compact('lessons'));
    }

    public function update(RequestsUser $request)
    {
       if (auth()->user()->update(['name' => $request -> name , 'email' => $request -> email])){
           return redirect()->back()->with('success', 'El usuario se ha actualizado correctamente');
       }
       return redirect()->back()->withErrors([
            'name' => 'No se ha podido actualizar el nombre',
            'email' => 'Email ya registrado'
       ]);
    }
}
