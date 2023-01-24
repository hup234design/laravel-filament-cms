<x-cms-services-layout>

    @section('banner')
        @parent
        SERVICES
    @endsection

    @foreach($services as $service)
        <h2>
            <a href="{{ route('service', $service->slug) }}">
                {{  $service->title }}
            </a>
        </h2>
        <p>{{  nl2br($service->summary) }}</p>
    @endforeach

</x-cms-services-layout>
