<?php

namespace App\View\Components;

use Illuminate\View\Component;

class studentsHomeworkComponent extends Component
{

    public $name,
           $description,
           $date,
           $homework,
           $lesson;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$description,$date,$id,$lesson)
    {
        $this->name = $name;
        $this->description=$description;
        $this->date = date('d/m/Y', strtotime($date));
        $this->homework = $id; 
        $this->lesson = $lesson; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.students-homework-component');
    }
}
