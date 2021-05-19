<?php

namespace App\View\Components;

use Illuminate\View\Component;

class studentsHomeworkComponent extends Component
{

    public $name,
        $image,
        $description,
        $date,
        $homework,
        $lesson,
        $status,
        $score,
        $key;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name,$image=null,$key=null,$description=null, $date=null, $id=null, $lesson=null, $status = null, $score = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->key = $key;
        if (isset($date)) {
            $this->date = date('d/m/Y h:i A', strtotime($date));
        }
        $this->homework = $id;
        $this->lesson = $lesson;
        $this->status = $status;
        $this->score = $score;
        $this->image = $image;
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
