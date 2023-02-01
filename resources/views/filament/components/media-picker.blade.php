
@php
    $statePath   = $getStatePath();
    $selectedUrl = $getSelectedMedia();
@endphp

<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$statePath"
>
    <div
        x-data="{ state: $wire.entangle('{{ $statePath }}') }"
        x-on:use-selected.window="$event.detail.statePath == '{{ $statePath }}' ? state = $event.detail.media.id : null"
        class="w-full"
    >

        <div class="space-y-4">

            @if( $selectedUrl )
                <img src="{{ $selectedUrl }}" class="w-full" >
            @endif

            <div class="w-full flex justify-center">
            <x-filament::button
                type="button"
                wire:click="mountFormComponentAction('{{ $statePath }}', 'media-library-picker')"
            >
                {{ $selectedUrl ? 'Change' : 'Select' }} Image
            </x-filament::button>
            </div>

        </div>

    </div>
</x-forms::field-wrapper>
