<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __invoke()
    {
        $homeworks = auth()
                    ->user()
                    ->homeworks()
                    ->paginate(5);
        
        return view('main',compact('homeworks'));
    }
}
