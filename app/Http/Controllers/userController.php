<?php

namespace App\Http\Controllers;

use App\Http\Requests\user as RequestsUser;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function index()
    {
        if (auth()->user()->type_id == 1) {
            $lessons = auth()
                ->user()
                ->lessons;
        } else {
            $lessons = auth()
                ->user()
                ->lesson()
                ->get();
        }
        return view('usuario.perfil', compact('lessons'));
    }

    public function update(RequestsUser $request, User $id)
    {
       if ($id->update(['name' => $request -> name , 'email' => $request -> email])){
           return redirect()->back()->with('success', 'El usuario se ha actualizado correctamente');
       }
       return redirect()->back()->withErrors([
            'key' => 'No se ha podido actualizar el codigo',
            'name' => 'No se ha podido actualizar el nombre',
            'carreer' => 'No se ha podido actualizar la carrera',
            'email' => 'Email ya registrado'
       ]);
    }
}
