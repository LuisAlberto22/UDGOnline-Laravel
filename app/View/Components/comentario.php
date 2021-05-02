<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class comentario extends Component
{
    public $title,
           $description,
           $date,
           $user,
           $img;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$description,$date,$user,$img)
    {
        $this->title=$title;
        $this->description=$description;
        $this->date=$date;
        $this->user = $user;
        $this->img = $img;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.comentario');
    }
}
