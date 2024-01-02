<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class deleteItem extends Component
{


    public $route;
    public $item;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $item)
    {
        $this->route=$route;
        $this->item=$item;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-item');
    }
}
