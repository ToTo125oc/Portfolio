<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class header extends Component
{

    public $avatar;
    public $nomPrenom;
    public $pageActuel;
    /**
     * Create a new component instance.
     */
    public function __construct($avatar, $nomPrenom, $pageActuel)
    {
        $this->avatar=$avatar;
        $this->nomPrenom=$nomPrenom;
        $this->pageActuel=$pageActuel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
