<?php

namespace Hup234design\FilamentCms\Components;

use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class AppLayout extends Component
{
    protected $layout;
    protected $sidebar;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($layout = 'app', $sidebar = null)
    {
        $this->layout  = $layout;
        $this->sidebar = $sidebar;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //$header_menu = FilamentNavigation::get('header-menu');
        //$footer_menu = FilamentNavigation::get('footer-menu');

        return view('filament-cms::layouts.'.$this->layout, [
            //'header_menu' => $header_menu?->items,
            //'footer_menu' => $footer_menu?->items,
        ]);
    }
}
