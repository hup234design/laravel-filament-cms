<x-cms-app-layout>

    <x-slot name="sidebar">
        EVENTS SIDEBAR
    </x-slot>

    {{ $slot  }}

{{--    <main class="prose my-12">--}}
{{--        <div class="container">--}}
{{--            <div class="flex space-x-16">--}}
{{--                <div class="flex-1 break-all">--}}
{{--                    {{ $slot }}--}}
{{--                </div>--}}
{{--                <div class="flex-shrink-0 w-1/4 bg-gray-200 p-4 text-center font-bold">--}}
{{--                    <h3>UPCOMING EVENTS</h3>--}}
{{--                    <hr class="border-black">--}}
{{--                    @foreach($upcoming_events as $upcoming_event)--}}
{{--                        <p class="space-y-2">--}}
{{--                        <span class="block font-normal text-sm">--}}
{{--                            {{ $upcoming_event->date->format('d/m/Y') }}--}}
{{--                        </span>--}}
{{--                            <a href="{{ route('event', $upcoming_event->slug) }}">--}}
{{--                                {{ $upcoming_event->title }}--}}
{{--                            </a>--}}
{{--                        </p>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}

</x-cms-app-layout>
