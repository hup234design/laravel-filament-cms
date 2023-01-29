<div>
    <div class="container">
        @if( $data['display_heading'] )
            <h2>
                {{ $data['heading'] }}
            </h2>
        @endif
        {!! $data['content'] !!}
    </div>
</div>
