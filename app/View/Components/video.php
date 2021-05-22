<?php

namespace App\View\Components;

use App\Models\video as ModelsVideo;
use Illuminate\View\Component;

class video extends Component
{
    public $video;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = ModelsVideo::find($video);
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
