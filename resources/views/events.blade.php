<x-cms-events-layout>

    @section('banner')
        @parent
        {{ app(\Hup234design\FilamentCms\Settings\CmsSettings::class)->events_title }}
    @endsection

    @foreach($events as $event)
        <h2>
            <a href="{{ route('event', $event->slug) }}">
                {{  $event->title }}
            </a>
        </h2>
        <p>{{  nl2br($event->summary) }}</p>
    @endforeach

    <div>
        {{  $events->links() }}
    </div>

</x-cms-events-layout>
