<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formCompetence extends Component
{

    public $modif;
    public $competence;
    public $route;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $modif, $competence)
    {
        $this->route=$route;
        $this->competence=$competence;
        $this->modif=$modif;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-competence');
    }
}
