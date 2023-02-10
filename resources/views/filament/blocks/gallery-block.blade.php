<div class="py-8">
    @if( $gallery )

        <div class="container">
            @if( $data['display_heading'] )
                <h2>
                    {{ $data['heading'] }}
                </h2>
            @endif

            @if( $data['display_as'] == 'grid')

                <div class="grid grid-cols-5 gap-4">
                    @foreach( $gallery->gallery_images as $gallery_image)
                        @if($gallery_image->hasMedia('gallery_image'))
                            <a data-fslightbox href="{{ $gallery_image->firstMedia('gallery_image')->getUrl() }}" class="block w-full">
                                <img src="{{ $gallery_image->firstMedia('gallery_image')->findVariant('thumbnail')->getUrl() }}" alt="Image" class="my-0 w-full">
                            </a>
                        @endif
                    @endforeach
                </div>

            @elseif( $data['display_as'] == 'list')
                <div class="space-y-16">
                @foreach( $gallery->gallery_images as $gallery_image)
                    @if($gallery_image->hasMedia('gallery_image'))
                        <div class="flex gap-8">
                            <div class="w-64 flex-shrink-0">
                                <a data-fslightbox href="{{ $gallery_image->firstMedia('gallery_image')->getUrl() }}" class="block w-full">
                                    <img src="{{ $gallery_image->firstMedia('gallery_image')->findVariant('thumbnail')->getUrl() }}" alt="Image" class="my-0 w-full">
                                </a>
                            </div>
                            <div clas="flex-1">
                                <h2 class="mt-0">{{ $gallery_image->title }}</h2>
                                {!! $gallery_image->description !!}
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            @endif

        </div>

    @endif
</div>
