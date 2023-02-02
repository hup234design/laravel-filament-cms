
@php
    $statePath     = $getStatePath();
    $selectedMedia = $getSelectedMedia();
    $isGallery     = $isGallery();
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

            @if( $selectedMedia )
                @if( $isGallery )
                    <div class="w-full grid grid-cols-4 gap-4">
                        <img src="{{ $selectedMedia }}" class="w-full" >
                    </div>
                @else
                    <img src="{{ $selectedMedia }}" class="w-full" >
                @endif
            @endif

            <div class="w-full flex justify-center">
            <x-filament::button
                type="button"
                :color="$isGallery ? 'secondary' : 'primary'"
                wire:click="mountFormComponentAction('{{ $statePath }}', 'media-library-picker')"
            >
                {{ $selectedMedia ? 'Change' : 'Select' }} Image{{ $isGallery ? 's' : '' }}
            </x-filament::button>
            </div>

        </div>

    </div>
</x-forms::field-wrapper>
