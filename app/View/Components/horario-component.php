<?php

namespace App\View\Components;

use App\Models\schedule;
use Illuminate\View\Component;

class horariocomponent extends Component
{
    
    public  $name,
            $day,
            $start,
            $end; 

    public function __construct($name,$day,$start,$end)
    {
        $this->name = $name;
        $this->day = $day;
        $this->start = $start;
        $this->end = $end;
    }

   
    public function render()
    {
        return view('components.horario-component');
    }
}
