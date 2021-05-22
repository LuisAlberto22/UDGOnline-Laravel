<?php

namespace App\View\Components;

use Illuminate\View\Component;

class fileComponent extends Component
{
    public $file;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$model)
    {
       $this->file = $model::find($id);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-component');
    }
}
