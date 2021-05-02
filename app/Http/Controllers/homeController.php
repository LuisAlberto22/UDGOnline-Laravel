<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __invoke()
    {
        $posts = null;
        $posts = auth()
                    ->user()
                    ->lessons()
                    ->paginate(5);
        
        return view('main',compact('posts'));
    }
}
