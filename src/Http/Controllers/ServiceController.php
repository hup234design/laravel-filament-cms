<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index() : View
    {
        $services = Service::visible()->get();
        return view('filament-cms::services', compact('services'));
    }

    public function service($slug) : View
    {
        $service = Service::visible()->where('slug',$slug)->firstOrFail();
        $services = Service::visible()->select('title','slug')->get();

        return view('filament-cms::service', compact('service','services'));
    }
}
