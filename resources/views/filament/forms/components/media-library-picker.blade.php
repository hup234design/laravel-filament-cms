<div>
    <div
        x-on:use-selected.window="$dispatch('close-modal', { id: '{{ $modalId }}' })"
        x-on:use-selected.window="console.log('hello')"
        class="grid grid-cols-3 gap-8"
    >
        <div class="col-span-2">
            {{ $this->table }}
        </div>
        <div class="">

            @if( $this->selectedMedia->id)

                <div class="space-y-6 pb-16">
                    <div>
                        <div class="aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg">
                            <img src="{{ $this->selectedMedia->findVariant('featured')->getUrl() }}" alt="" class="object-cover">
                        </div>
                        <div class="mt-4">
                            <div>
                                <h2 class="text-lg font-medium text-gray-900 truncate"><span class="sr-only">Details for </span>
                                    {{ $this->selectedMedia->full_file_name }}
                                </h2>
                                <p class="text-sm font-medium text-gray-500">
                                    {{ $this->selectedMedia->file_size }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Information</h3>
                        <dl class="mt-2 divide-y divide-gray-200 border-t border-gray-200">

                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500">Uploaded</dt>
                                <dd class="whitespace-nowrap text-gray-900">
                                    {{ $this->selectedMedia->created_at }}
                                </dd>
                            </div>

                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500">Alt Text</dt>
                                <dd class="whitespace-nowrap text-gray-900">
                                    {{ $this->selectedMedia->alt }}
                                </dd>
                            </div>

                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500">Caption</dt>
                                <dd class="whitespace-nowrap text-gray-900">
                                    {{ $this->selectedMedia->caption }}
                                </dd>
                            </div>

                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500">Description</dt>
                                <dd class="whitespace-nowrap text-gray-900">
                                    {{ $this->selectedMedia->description }}
                                </dd>
                            </div>

                        </dl>
                    </div>
                    <div class="flex">
                        <x-filament::button
                            type="button"
                            color="success"
                            wire:click.prevent="useSelected"
                        >
                            Use This Image
                        </x-filament::button>
                    </div>

                    <div class="space-y-4">
                        @foreach( $this->selectedMedia->getAllVariants() as $variant )
                            <div class="relative">
                                <img src="{{ $variant->getUrl() }}" class="w-auto max-h-48 mx-auto">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-white bg-black bg-opacity-80 px-2 py-1 text-sm rounded-lg leading-none">{{ $variant->variant_name }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <p>no image selected</p>
            @endif

        </div>
    </div>
</div>
