<div class="py-8">
    @if( $testimonial )
        <div class="bg-gray-900 text-white py-12">
            <div class="container">
                @if( $data['display_heading'] )
                    <h2 class="text-white">
                        {{ $data['heading'] }}
                    </h2>
                @endif

                <blockquote class="text-white">
                    {!! $testimonial->content !!}
                </blockquote>

                <p class="text-right">
                    {{ $testimonial->title }}
                </p>
            </div>
        </div>
    @endif
</div>
