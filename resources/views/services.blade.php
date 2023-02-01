<x-cms-services-layout>

    @section('banner')
        @parent
        {{ app(\Hup234design\FilamentCms\Settings\CmsSettings::class)->services_title }}
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
