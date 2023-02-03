<?php

namespace Hup234design\FilamentCms\Composers;

use Hup234design\FilamentCms\Models\Post;
use Illuminate\View\View;

class PostsComposer
{
    /**
     * The user repository implementation.
     *
     * @var Post
     */
    protected $posts;

    /**
     * Create a new profile composer.
     *
     * @param  Post  $posts
     * @return void
     */
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'recent_posts' => $this->posts->recent(5)->get()
        ]);
    }
}
