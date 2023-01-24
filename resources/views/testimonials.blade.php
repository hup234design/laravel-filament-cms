<x-cms-app-layout>

    @section('banner')
        @parent
        TESTIMONIALS
    @endsection

    <div class="container">

        <div class="divide-y-4">
    @foreach($testimonials as $testimonial)
        <div class="py-4">
        <blockquote>
            {!! $testimonial->content !!}
        </blockquote>
        <p class="italic">
            {{ $testimonial->name }}
        </p>
        </div>
    @endforeach
        </div>

    <div class="not-prose">
        {{  $testimonials->links() }}
    </div>

    </div>

</x-cms-app-layout>
