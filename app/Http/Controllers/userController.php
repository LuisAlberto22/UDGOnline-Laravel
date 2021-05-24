<?php

namespace App\Http\Controllers;

use App\Http\Requests\user as RequestsUser;
use Illuminate\Support\Facades\Storage;

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
        $user = auth()->user();
        if ($request->file('file')) {
            if ($user->image != "default/default.png") {
                Storage::delete($user->image);
            }
            $path = Storage::put($user->roles()->first()->name."s/".$user->key."/img",$request->file('file'),);
            $user->image = $path;
        }
        $user->update($request->all());
        return redirect()->back()->with('success', 'El usuario se ha actualizado correctamente');
    }
}
