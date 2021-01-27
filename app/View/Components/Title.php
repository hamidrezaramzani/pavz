<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{

    public $link;
    public $title;
    public $description;
    public $linkTitle;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $description, $link, $linkTitle)
    {
        $this->linkTitle = $linkTitle;
        $this->link = $link;
        $this->title = $title;
        $this->description = $description;
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
