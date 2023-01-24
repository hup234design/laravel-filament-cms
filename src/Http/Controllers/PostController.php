<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index() : View
    {
        $posts = Post::live()->paginate(5);

        return view('filament-cms::posts', [
            'posts' => $posts,
            'page'
        ]);
    }

    public function post($slug) : View
    {
        $post = Post::where('slug',$slug)->firstOrFail();

        return view('filament-cms::post', [
            'post' => $post,
        ]);
    }
}
