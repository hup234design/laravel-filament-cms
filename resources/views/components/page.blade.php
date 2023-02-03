@props(['record'])

@if( count($record->header_blocks) > 0 )
    @section('header')
        @parent
        @if($record->hasMedia('header_image'))
            <div class="absolute inset-0">
                <img src="{{ $record->firstMedia('header_image')->findVariant('banner')->getUrl() }}" class="h-full w-full object-cover object-center">
            </div>
        @endif
        <div class="relative">
            <x-filament-cms::blocks :blocks="$record->header_blocks" />
        </div>
    @endsection
@else
    @section('banner')
        @parent
        @if($record->hasMedia('header_image'))
            <div class="absolute inset-0 bg-black">
                <img src="{{ $record->firstMedia('header_image')->findVariant('banner')->getUrl() }}" class="h-full w-full object-cover object-center opacity-50">
            </div>
            <div class="absolute inset-0 flex items-center justify-center text-white">
                {{ $record->title }}
            </div>
        @else
            {{ $record->title }}
        @endif
    @endsection
@endif

<div class="container">
    <h1>{{ $record->title }}</h1>
    @if($record->hasMedia('featured_image'))
        <img src="{{ $record->firstMedia('featured_image')->findVariant('featured')->getUrl() }}" class="w-full">
    @endif

    {!! $record->content !!}
</div>

@if( $record->content_blocks )
    <x-filament-cms::blocks :blocks="$record->content_blocks" />
@endif
