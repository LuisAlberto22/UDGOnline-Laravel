<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HorarioComponent extends Component
{
    public $name,
        $day,
        $start,
        $end;
    public function __construct($name, $day, $start, $end)
    {
        $this->name = $name;
        $this->day = $day;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.horario-component');
    }
}
