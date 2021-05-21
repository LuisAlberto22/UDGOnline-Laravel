<?php

namespace App\View\Components;

use Illuminate\View\Component;

class video extends Component
{
    public $link,
           $name,
           $description,
           $lesson,
           $image;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link,$name,$description,$lesson,$image)
    {
        $this->link = $link;
        $this->name = $name;
        $this->lesson = $lesson;
        $this->image = $image;
        $this->description = $description;
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
