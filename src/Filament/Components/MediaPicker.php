<?php

namespace Hup234design\FilamentCms\Filament\Components;

use Filament\Forms\Components\Field;
use Hup234design\FilamentCms\Filament\Actions\MediaPickerAction;
use Hup234design\FilamentCms\Models\MediaLibrary;

class MediaPicker extends Field
{
    protected string $view = 'filament-cms::filament.components.media-picker';

    protected string|null  $variant = null;
    protected bool|null $gallery = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mediaModel = MediaLibrary::class;

        $this->registerActions([
            MediaPickerAction::make(),
        ]);
    }

    public function variant(string | \Closure | null $variant): static
    {
        $this->variant = $variant;

        return $this;
    }

    public function gallery(bool | \Closure | null $gallery): static
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function getVariant(): string
    {
        return $this->evaluate($this->variant);
    }

    public function isGallery(): string
    {
        return $this->evaluate($this->gallery);
    }

    public function removeSelected() {
        $this->dispatchBrowserEvent('use-selected', ['media' => null, 'statePath' => $this->statePath]);
    }

    public function getSelectedMedia(): string|null
    {
        ray()->clearAll();
        ray("getSelectedMedia");
        ray($this->getState());
            if ( $media = MediaLibrary::where('id', $this->getState())->first() ) {
                if ($this->variant) {
                    return $media->findVariant($this->variant)?->getUrl();
                } else {
                    return $media->findOriginal();
                }
            }
        return null;
    }

}
