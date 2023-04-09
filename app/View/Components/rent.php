<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class rent extends Component
{
    /**
     * Create a new component instance.
     */
    public $logs;
    public function __construct($logs)
    {
        $this->logs = $logs;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rent');
    }
}
