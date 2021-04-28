<?php

namespace App\View\Components;

use Illuminate\View\Component;

class clasesComponent extends Component
{

    public $nrc,
              $name,
              $cicle,
              $teacher;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nrc,$name,$cicle,$teacher)
    {
        $this->nrc = $nrc;
        $this->name = $name;
        $this->cicle = $cicle;
        $this->teacher = $teacher;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.clases-component');
    }
}
