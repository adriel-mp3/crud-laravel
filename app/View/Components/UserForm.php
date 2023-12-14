<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserForm extends Component
{
    public $action;

    public $method;

    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $method, $user = null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.user-form');
    }
}
