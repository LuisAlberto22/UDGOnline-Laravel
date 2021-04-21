<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tareas extends Component
{
    public  $fecha,
            $titulo,
            $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fecha,$titulo,$link)
    {
        $this->fecha = $fecha;
        $this->titulo =$titulo;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tareas');
    }
}
