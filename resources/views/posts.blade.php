<x-cms-posts-layout>

    @section('banner')
        @parent
        POSTS
    @endsection

    @foreach($posts as $post)
        <div class="flex gap-4 mb-8">
            <div class="w-48">
                @if( $post->hasMedia('featured_image'))
                    <img src="{{ $post->firstMedia('featured_image')->findVariant('thumbnail')->getUrl() }}" class="w-48 h-auto my-0">
                @else
                    <div class="w-full h-full bg-gray-200"></div>
                @endif
            </div>
            <div class="flex-1">
                <h2 class="mt-0">
                    <a href="{{ route('post', $post->slug) }}">
                        {{  $post->title }}
                    </a>
                </h2>
                <p class="prose-sm">{{  nl2br($post->summary) }}</p>
                <p class="mb-0"><a href="{{ route('post', $post->slug) }}">Read More</a></p>
            </div>
        </div>
    @endforeach

    <div class="not-prose">
        {{  $posts->links() }}
    </div>

</x-cms-posts-layout>
