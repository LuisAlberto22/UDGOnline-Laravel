<?php

namespace App\Http\Controllers;


class homeController extends Controller
{
    public function __invoke()
    { 
        return view('main');
    }
}
