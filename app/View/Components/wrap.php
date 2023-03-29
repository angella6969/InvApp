<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class wrap extends Component
{
    /**
     * Create a new component instance.
     */
    public $text, $text1, $text2, $url;
    public function __construct($text, $text1, $text2, $url)
    {
        $this->text=$text;
        $this->text1=$text1;
        $this->text2=$text2;
        $this->url=$url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.wrap');
    }
}
