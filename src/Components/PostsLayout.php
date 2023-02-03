<?php

namespace Hup234design\FilamentCms\Components;

use Hup234design\FilamentCms\Models\Post;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class PostsLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('filament-cms::layouts.posts');
    }
}
