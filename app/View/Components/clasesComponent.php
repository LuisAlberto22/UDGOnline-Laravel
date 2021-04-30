<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class clasesComponent extends Component
{

    public $nrc,
        $name,
        $image,
        $teacher;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($nrc, $image,$name, $teacher)
    {
        $this->nrc = $nrc;
        $this->name = $name;
        $this->image = $image;
        $this->teacher = User::find($teacher);
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
