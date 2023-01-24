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

    <ul class="flex items-center justify-center gap-8">
        <li>
            <a href="{{ route('home') }}" class="text-md text-white leading-none font-medium">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('page', 'about') }}" class="text-md text-white leading-none font-medium">
                About
            </a>
        </li>
        <li>
            <a href="{{ route('services') }}" class="text-md text-white leading-none font-medium">
                Services
            </a>
        </li>
        <li>
            <a href="{{ route('projects') }}" class="text-md text-white leading-none font-medium">
                Projects
            </a>
        </li>
        <li>
            <a href="{{ route('events') }}" class="text-md text-white leading-none font-medium">
                Events
            </a>
        </li>
        <li>
            <a href="{{ route('testimonials') }}" class="text-md text-white leading-none font-medium">
                Testimonials
            </a>
        </li>
        <li>
            <a href="{{ route('posts') }}" class="text-md text-white leading-none font-medium">
                Posts
            </a>
        </li>
        <li>
            <a href="{{ route('page', 'contact') }}" class="text-md text-white leading-none font-medium">
                Contact
            </a>
        </li>
    </ul>
{{--    @if($header_menu)--}}
{{--    <ul class="flex items-center justify-center gap-16">--}}
{{--        @foreach( $header_menu as $item )--}}
{{--            <li>--}}
{{--                @php--}}
{{--                    switch($item['type']) {--}}
{{--                        case "page":--}}
{{--                            $href = route('page', $item['data']['slug']);--}}
{{--                            break;--}}
{{--                        default:--}}
{{--                            $href = route($item['type']);--}}
{{--                            break;--}}
{{--                    }--}}
{{--                @endphp--}}
{{--                <a href="{{ $href }}" class="text-md text-white leading-none font-medium">--}}
{{--                    {{ $item['label'] }}--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
{{--    @endif--}}
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

        <ul class="flex items-center justify-center gap-8">
            <li>
                <a href="{{ route('home') }}" class="text-sm text-white leading-none font-medium lowercase">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('page', 'terms-conditions') }}" class="text-sm text-white leading-none font-medium lowercase">
                    Terms & Conditions
                </a>
            </li>
            <li>
                <a href="{{ route('page', 'privacy-policy') }}" class="text-sm text-white leading-none font-medium lowercase">
                    Privacy Policy
                </a>
            </li>
            <li>
                <a href="{{ route('page', 'cookie-policy') }}" class="text-sm text-white leading-none font-medium lowercase">
                    Cookie Policy
                </a>
            </li>
            <li>
                <a href="{{ route('page', 'contact') }}" class="text-sm text-white leading-none font-medium lowercase">
                    Contact
                </a>
            </li>
            <li>
                <a href="{{ url('/admin') }}" class="text-sm text-white leading-none font-medium lowercase">
                    Admin
                </a>
            </li>
        </ul>
{{--        <ul class="flex items-center justify-center gap-16">--}}
{{--            @if($footer_menu)--}}
{{--                @foreach( $footer_menu as $item )--}}
{{--                    <li>--}}
{{--                        @php--}}
{{--                            switch($item['type']) {--}}
{{--                                case "page":--}}
{{--                                    $href = route('page', $item['data']['slug']);--}}
{{--                                    break;--}}
{{--                                default:--}}
{{--                                    $href = route($item['type']);--}}
{{--                                    break;--}}
{{--                            }--}}
{{--                        @endphp--}}
{{--                        <a href="{{ $href }}" class="text-sm text-white leading-none font-medium lowercase">--}}
{{--                            {{ $item['label'] }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--                <li>--}}
{{--                    <a href="{{ url('/admin') }}" class="text-sm text-white leading-none font-medium lowercase">--}}
{{--                        Admin--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        @endif--}}
        <div class="text-center text-sm text-gray-200">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</footer>

</body>
</html>
