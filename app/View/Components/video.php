<?php

namespace App\View\Components;

use Illuminate\View\Component;

class video extends Component
{
    public $link,
           $nombre,
           $descripcion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link,$nombre,$descripcion)
    {
        $this->link=$link;
        $this->nombre=$nombre;
        $this->descripcion = $descripcion;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.video');
    }
}
