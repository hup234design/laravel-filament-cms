<section class="py-24">
    <div class="container px-4 mx-auto">
        <div class="max-w-xl lg:max-w-3xl mx-auto text-center">

            <h2 class="mt-2 mb-4 text-3xl leading-tight md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight font-bold font-heading text-white">
                {{ $data['heading'] }}
            </h2>
            <p class="mb-8 text-base leading-relaxed lg:text-xl lg:leading-relaxed text-gray-100">
                {{ nl2br($data['text']) }}
            </p>
            @if( $data['links'])
            <div>
                @foreach($data['links'] as $link)
                    <a class="block md:inline-block px-5 py-3 text-sm font-semibold text-black hover:text-gray-800 bg-white hover:bg-gray-50 border border-white hover:border-gray-100 rounded transition duration-200"
                       href="{{ route('page', $link['slug'] ) }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
