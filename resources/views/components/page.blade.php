@props(['record'])

@section('banner')
    @parent
{{--    @if($record->hasMedia('header_image'))--}}
{{--        <div class="absolute inset-0 bg-black">--}}
{{--            <img src="{{ $record->firstMedia('header_image')->getUrl() }}" class="h-full w-full object-cover object-center opacity-70">--}}
{{--        </div>--}}
{{--        <div class="absolute inset-0 flex items-center justify-center text-white">--}}
{{--            {{ $record->title }}--}}
{{--        </div>--}}
{{--    @else--}}
        {{ $record->title }}
{{--    @endif--}}
@endsection

<div class="container">
{{--    @if($record->hasMedia('featured_image'))--}}
{{--        <img src="{{ $record->firstMedia('featured_image')->getUrl() }}" class="w-full">--}}
{{--    @endif--}}
{{--    <h1>--}}
{{--        {{ $record->title }}--}}
{{--    </h1>--}}
    {!! $record->content !!}
</div>
