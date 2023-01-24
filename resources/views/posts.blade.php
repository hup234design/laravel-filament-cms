<x-cms-posts-layout>

    @section('banner')
        @parent
        POSTS
    @endsection

    @foreach($posts as $post)
        <h2>
            <a href="{{ route('post', $post->slug) }}">
                {{  $post->title }}
            </a>
        </h2>
        <p>{{  nl2br($post->summary) }}</p>
    @endforeach

    <div class="not-prose">
        {{  $posts->links() }}
    </div>

</x-cms-posts-layout>
