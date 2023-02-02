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
                    @foreach( $gallery->gallery_images as $image)
                        @if($image->hasMedia('gallery_image'))
                            <img src="{{ $image->firstMedia('gallery_image')->findVariant('thumbnail')->getUrl() }}" class="my-0 w-full">
                        @endif
                    @endforeach
                </div>

            @elseif( $data['display_as'] == 'list')
                <div class="space-y-16">
                @foreach( $gallery->gallery_images as $gallery_image)
                    @if($gallery_image->hasMedia('gallery_image'))
                        <div class="flex gap-8">
                            <div class="w-64 flex-shrink-0">
                                <img src="{{ $gallery_image->firstMedia('gallery_image')->findVariant('thumbnail')->getUrl() }}" class="my-0 w-full">
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
