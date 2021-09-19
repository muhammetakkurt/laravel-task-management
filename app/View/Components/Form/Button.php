<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $route;
    public $name;
    public $color;

    public function __construct($route , $name , $color)
    {
        $this->route = $route;
        $this->name = $name;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.button');
    }
}
