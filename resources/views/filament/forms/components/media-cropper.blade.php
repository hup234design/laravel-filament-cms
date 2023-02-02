<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }" class="mt-4 space-y-4">

        @foreach( config('filament-cms.media.variants') as $variant=>$settings)

            {{--<h3 class="text-lg font-semibold">{{ $variant }} ( {{ $getRecord()->findVariant($variant)->size }} )</h3>--}}
            <h3 class="text-lg font-semibold">{{ $variant }} </h3>

            <div class="">
                <div
                    class="space-y-4 h-full"
                    wire:ignore
                    x-data="{
                        setUp() {
                            setTimeout(() => {
                                let el = document.getElementById('{{ $variant }}-image-el');
                                const {{ $variant }}Cropper = new Cropper(el, {
                                    aspectRatio : {{ $settings['aspect_ratio'] }},
                                    autoCropArea: 1,
                                    viewMode: 1,
                                    data: state.{{ $variant }}.width ? {
                                        x:  state.{{ $variant }}.x,
                                        y:  state.{{ $variant }}.y,
                                        width:  state.{{ $variant }}.width,
                                        height: state.{{ $variant }}.height,
                                    } : {},
                                    crop() {
                                        state.{{ $variant }}.x = event.detail.x
                                        state.{{ $variant }}.y = event.detail.y
                                        state.{{ $variant }}.width = event.detail.width
                                        state.{{ $variant }}.height = event.detail.height
                                    }
                                })
                            }, 500);
                        }
                    }"
                    x-init="setUp()"
                >
                    <div class="w-full h-auto">
                        <img
                            id="{{ $variant }}-image-el"
                            class="w-full h-auto"
                            src="{{  $getRecord()->getUrl() }}">
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</x-dynamic-component>
