<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $label;
    public $errors;

    public function __construct($label, $errors)
    {
        $this->label = $label;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-list');
    }
}
