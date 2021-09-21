<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public $options;
    public $firstValue;
    public $selected;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options = null, $selected = null, $firstValue = null)
    {
        $this->options = $options;
        $this->firstValue = $firstValue;
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select');
    }
}
