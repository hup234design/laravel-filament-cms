@props(['record'])

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

<div class="container">
    @if($record->hasMedia('featured_image'))
        <img src="{{ $record->firstMedia('featured_image')->findVariant('featured')->getUrl() }}" class="w-full">
    @endif
    {!! $record->content !!}
</div>

@if( $record->content_blocks )
    <x-filament-cms::blocks :blocks="$record->content_blocks" />
@endif
