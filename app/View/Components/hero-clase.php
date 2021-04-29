<?php

namespace App\View\Components;

use Illuminate\View\Component;

class heroclase extends Component
{
    public $name,
           $nrc,
           $image,
           $cicle;

    public function __construct($name,$nrc,$cicle,$image)
    {
        $this->name = $name;
        $this->nrc = $nrc;
        $this->cicle = $cicle;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hero-clase');
    }
}
