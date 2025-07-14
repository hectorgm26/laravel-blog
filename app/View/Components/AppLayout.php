<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $metaTitle = "Default Title";
    public $metaDescription = "Default description";

    public function __construct($metaTitle = null, $metaDescription = null) 
    {
        $this->metaTitle = $metaTitle;
        $this->metaDescription = $metaDescription;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
