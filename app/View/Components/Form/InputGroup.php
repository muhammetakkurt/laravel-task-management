<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public $type;
    public $name;
    public $value;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null, $name = null, $value = null, $title = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input-group');
    }
}
