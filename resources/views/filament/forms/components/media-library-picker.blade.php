<div>
    {{ $modalId }}
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
                                <h2 class="text-lg font-medium text-gray-900"><span class="sr-only">Details for </span>IMG_4985.HEIC</h2>
                                <p class="text-sm font-medium text-gray-500">3.9 MB</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Information</h3>
                        <dl class="mt-2 divide-y divide-gray-200 border-t border-b border-gray-200">

                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500">Uploaded</dt>
                                <dd class="whitespace-nowrap text-gray-900">June 8, 2020</dd>
                            </div>

                            <div class="flex justify-between py-3 text-sm font-medium">
                                <dt class="text-gray-500">Dimensions</dt>
                                <dd class="whitespace-nowrap text-gray-900">4032 x 3024</dd>
                            </div>

                        </dl>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-900">Description</h3>
                        <div class="mt-2">
                            <p class="text-sm italic text-gray-500">Add a description to this image.</p>
                        </div>
                    </div>
                    <div class="flex">
                        <button
                            type="button"
                            class="ml-3 flex-1 rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                            wire:click.prevent="useSelected"
                        >
                            Use This Image
                        </button>
                    </div>
                </div>
            @else
                <p>no image selected</p>
            @endif

        </div>
    </div>
</div>
