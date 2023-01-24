<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Project;
use Hup234design\FilamentCms\Models\Service;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index() : View
    {
        $projects = Project::visible()->paginate(5);
        return view('filament-cms::projects', compact('projects'));
    }

    public function project($slug) : View
    {
        $project = Project::visible()->where('slug',$slug)->firstOrFail();
        $projects = Project::visible()->select('title','slug')->get();

        return view('filament-cms::project', compact('project','projects'));
    }
}
