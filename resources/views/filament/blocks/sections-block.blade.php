<div class="py-8">
    <div class="container">
        @if( $data['display_heading'] )
            <h2>
                {{ $data['heading'] }}
            </h2>
        @endif

        @if($data['format'] == 'list')

            <div class="space-y-16">
                @foreach( $sections as $section)
                    <div class="flex gap-8">
                        @if($section->featured_image)
                            <div class="w-64 flex-shrink-0">
                                <img src="{{ $section->featured_image->findVariant('thumbnail')->getUrl() }}" alt="Image" class="my-0 w-full">
                            </div>
                        @endif
                        <div clas="flex-1">
                            <h2 class="mt-0">{{ $section->title }}</h2>
                            {!! $section->content !!}
                        </div>
                    </div>
                @endforeach
            </div>

        @elseif($data['format'] == 'cards')

            <div class="grid grid-cols-3 gap-8">
                @foreach( $sections as $section)
                    <div class="border">
                    <div>
                        @if($section->featured_image)
                            <img src="{{ $section->featured_image->findVariant('featured')->getUrl() }}" alt="Image" class="my-0 w-full">
                        @endif
                    </div>
                    <div class="p-4">
                        <h2 class="mt-0">{{ $section->title }}</h2>
                        <div class="line-clamp-3">
                            {!! $section->content !!}
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>

        @elseif($data['format'] == 'gallery')

            <div class="grid grid-cols-5 gap-8">
                @foreach( $sections as $section)
                    <div>
                        @if($section->featured_image)
                            <img src="{{ $section->featured_image->findVariant('thumbnail')->getUrl() }}" alt="Image" class="my-0 w-full">
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
