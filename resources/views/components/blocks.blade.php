@props(['blocks'])

@foreach( $blocks as $block )
    @livewire($block['type'], ['data' => $block['data']])
@endforeach
