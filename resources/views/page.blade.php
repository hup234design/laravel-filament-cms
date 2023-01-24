<x-cms-app-layout>

    <x-filament-cms::page :record="$page" />

    <div class="container my-8">
        <div class="not-prose">
            <div class="grid grid-cols-6 gap-8">
                @foreach($gallery->gallery_images as $gallery_image)
                    <div>
                        <img src="{{ $gallery_image->media->thumbnail_url }}" class="w-full h-auto">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-cms-app-layout>
