<div class="py-8">
    @if( $media )
        <div class="container">
            @if( $data['display_heading'] )
                <h2>
                    {{ $data['heading'] }}
                </h2>
            @endif

            <img
                src="{{ $media->findVariant('featured')?->getUrl() ?? $media->getUrl() }}"
                class="w-full"
            />
        </div>
    @endif
</div>
