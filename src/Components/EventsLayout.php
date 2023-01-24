<?php

namespace Hup234design\FilamentCms\Components;

use Hup234design\FilamentCms\Models\Event;
use Illuminate\View\Component;
use RyanChandler\FilamentNavigation\Facades\FilamentNavigation;

class EventsLayout extends Component
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
        $upcoming_events = Event::upcoming()->take(5);

        return view('filament-cms::layouts.events', [
            'upcoming_events' => $upcoming_events,
        ]);
    }
}
