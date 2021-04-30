<?php

namespace App\Http\Controllers;

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
}
