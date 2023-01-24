<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Event;
use Illuminate\View\View;

class EventController extends Controller
{
    public function index() : View
    {
        $events = Event::upcoming()->paginate();
        return view('filament-cms::events', compact('events'));
    }

    public function event($slug) : View
    {
        $event  = Event::where('slug',$slug)->where('visible',true)->firstOrFail();
        $events = Event::upcoming()->get();

        return view('filament-cms::event', compact('event','events'));
    }
}
