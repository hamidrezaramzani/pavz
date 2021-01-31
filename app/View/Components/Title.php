<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{

    public $title;
    public $description;
    public $mode = "light";
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $description , $mode = "light")
    {
        $this->title = $title;
        $this->description = $description;
        $this->mode = $mode;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.title');
    }
}
