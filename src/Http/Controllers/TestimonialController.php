<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Testimonial;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index() : View
    {
        $testimonials = Testimonial::paginate(5);
        return view('filament-cms::testimonials', compact('testimonials'));
    }
}
