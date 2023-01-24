<x-cms-app-layout>

    <x-slot name="sidebar">
        <h3>RECENT POSTS</h3>
        <hr class="border-black">
        @foreach($recent_posts as $recent_post)
            <p class="space-y-2">
                                <span class="block font-normal text-sm">
                                     {{ $recent_post->published_at->format('d/m/Y') }}
                                </span>
                <a href="{{ route('post', $recent_post->slug) }}">
                    {{ $recent_post->title }}
                </a>
            </p>
        @endforeach
    </x-slot>

    {{ $slot  }}

</x-cms-app-layout>
