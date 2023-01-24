@props(['record'])

@section('banner')
    @parent
{{--    @if($record->hasMedia('header_image'))--}}
{{--        <div class="absolute inset-0">--}}
{{--            <img src="{{ $record->firstMedia('header_image')->getUrl() }}" class="h-full w-full object-cover object-center">--}}
{{--        </div>--}}
{{--    @endif--}}
    {{ $record->title }}
@endsection

{{--@section('hero')--}}
{{--    @parent--}}
{{--    {{ $record->title }}--}}
{{--@endsection--}}

    <div class="container">
{{--        @if($record->hasMedia('featured_image'))--}}
{{--            <img src="{{ $record->firstMedia('featured_image')->getUrl() }}" class="w-full">--}}
{{--        @endif--}}
{{--    <h1>--}}
{{--        {{ $record->title }}--}}
{{--    </h1>--}}
    {!! $record->content !!}
    </div>

{{--@section('banner')--}}
{{--    @parent--}}
{{--    {{ $page->title }}--}}
{{--@endsection--}}

{{--@isset($page->content)--}}
{{--    <div class="container">--}}
{{--        {!! $page->content !!}--}}
{{--    </div>--}}
{{--@endisset--}}

