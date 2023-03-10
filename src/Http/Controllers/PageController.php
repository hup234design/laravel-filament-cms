<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home() : View
    {
        // $page = Page::where('home',true)->firstOrFail();
        // return view('filament-cms::home', [
        //     'page' => $page
        // ]);

        $page = Page::where('home',true)->first();

        if ($page) {
            return view('filament-cms::home', [
                'page' => $page
            ]);
        } else {
            return view('welcome');
        }
    }

    public function page($slug) : View
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('filament-cms::page', [
            'page' => $page
        ]);
    }
}
