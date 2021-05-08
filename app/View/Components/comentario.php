<?php

namespace App\View\Components;

use Illuminate\View\Component;

class comentario extends Component
{
    public $title,
           $description,
           $content,
           $date,
           $user,
           $img;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title,$description,$date,$user,$img,$content = "a")
    {
        $this->title=$title;
        $this->description=$description;
        $this->date = date('d/m/Y h:i A',strtotime($date));
        $this->user = $user;
        $this->img = $img;
        $this->content = $content;
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
