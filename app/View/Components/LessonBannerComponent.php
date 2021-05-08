<?php

namespace App\View\Components;

use App\Models\Lesson;
use Illuminate\View\Component;

class LessonBannerComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
   public $name,
           $nrc,
           $image,        
           $score;

    public function __construct($name,$nrc,$image,$id)
    {
        $this->name = $name;
        $this->nrc = $nrc;
        $this->image = $image;
        if (auth()->user()->hasRole('Alumno')) {
          $this->score= auth()
                            ->user()
                            ->lessons()
                            ->find($id)
                            ->pivot
                            ->score;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lesson-banner-component');
    }
}
