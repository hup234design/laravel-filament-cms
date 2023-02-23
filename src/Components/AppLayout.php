<?php

namespace Hup234design\FilamentCms\Components;

use Hup234design\FilamentCms\Settings\CmsSettings;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;
use RyanChandler\FilamentNavigation\Models\Navigation;

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
        $model = FilamentNavigation::getModel();

        $menus = [
            'primary_header'   => $model::find(app(CmsSettings::class)->primary_header_menu_id)?->items,
            'secondary_header' => $model::find(app(CmsSettings::class)->secondary_header_menu_id)?->items,
            'primary_footer'   => $model::find(app(CmsSettings::class)->primary_footer_menu_id)?->items,
            'secondary_footer' => $model::find(app(CmsSettings::class)->secondary_footer_menu_id)?->items,
        ];

        return view('filament-cms::layouts.'.$this->layout, compact('menus'));
    }
}
