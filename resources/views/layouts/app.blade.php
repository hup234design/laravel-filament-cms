<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body class="antialiased">

<header class="h-24 px-8 bg-gray-700 flex items-center justify-between">
    <a href="{{ route('home') }}" class="text-xl text-white leading-none font-bold">
        {{ config('app.name') }}
    </a>

    @if($header_menu)
    <ul class="flex items-center justify-center gap-16">
        @foreach( $header_menu as $item )
            @if($item['type'] == 'external-link')
                <a href="{{ $item['data']['url'] }}" target="{{ $item['data']['target'] }}" class="text-md text-white leading-none font-medium">
                    {{ $item['label'] }}
                </a>
            @else
                <li>
                    @php
                        switch($item['type']) {
                            case "page":
                                $href = $item['data']['slug'] == 'home' ? route('home') : route('page', $item['data']['slug']);
                                break;
                            default:
                                $href = route( $item['data']['slug'] );
                                break;
                        }
                    @endphp
                    <a href="{{ $href }}" class="text-md text-white leading-none font-medium">
                        {{ $item['label'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
    @endif
</header>

@hasSection('banner')
    <div class="relative h-32 bg-gray-200 flex items-center justify-center border-b border-gray-400">
        <span class="text-3xl font-extrabold leading-none uppercase">
            @yield('banner')
        </span>
    </div>
@endisset

@hasSection('hero')
    <div class="relative h-96 bg-gray-300 flex items-center justify-center">
        <span class="text-3xl font-extrabold leading-none uppercase">
            @yield('hero')
        </span>
    </div>
@endisset

<main class="my-12">
    <div @class(['container' => isset($sidebar)])>
        <div class="prose flex space-x-16">
            <div class="flex-1 break-all">
                {{ $slot }}
            </div>
            @isset($sidebar)
                <div class="flex-shrink-0 w-1/4 bg-gray-200 p-4 text-center font-bold">
                    {{ $sidebar }}
                </div>
            @endisset
        </div>
    </div>

    @hasSection('blocks')
        @yield('blocks')
    @endisset
</main>

<footer class="py-12 bg-gray-800">
    <div class="container space-y-12">
        <div class="text-center text-lg font-bold text-gray-200">
            {{ config('app.name') }}
        </div>

        @if($footer_menu)
            <ul class="flex items-center justify-center gap-8">
                @foreach( $footer_menu as $item )
                    @if($item['type'] == 'external-link')
                        <a href="{{ $item['data']['url'] }}" target="{{ $item['data']['target'] }}" class="text-sm text-white leading-none font-medium lowercase">
                            {{ $item['label'] }}
                        </a>
                    @else
                        <li>
                            @php
                                switch($item['type']) {
                                    case "page":
                                        $href = $item['data']['slug'] == 'home' ? route('home') : route('page', $item['data']['slug']);
                                        break;
                                    default:
                                        $href = route( $item['data']['slug'] );
                                        break;
                                }
                            @endphp
                            <a href="{{ $href }}" class="text-sm text-white leading-none font-medium lowercase">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif

        <div class="text-center text-sm text-gray-200">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</footer>

</body>
</html>
