<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public $without;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($without = null)
    {
        $this->without = $without;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
