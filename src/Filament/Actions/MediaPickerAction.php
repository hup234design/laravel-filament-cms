<?php
namespace Hup234design\FilamentCms\Filament\Actions;

use Filament\Forms\Components\Actions\Action;
use Hup234design\FilamentCms\Filament\Components\MediaPicker;
use Illuminate\View\View;

class MediaPickerAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'media-library-picker';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->modalWidth = 'screen';

        $this->modalActions([]);

        $this->modalHeading('Media Picker');

        $this->modalContent(static function(MediaPicker $component): View {
            return view('filament-cms::filament.components.media-picker-action', [
                'statePath' => $component->getStatePath(),
                'isGallery' => $component->isGallery(),
                'recordId' => $component->getRecord()?->id,
                'modalId'   => $component->getLivewire()->id . '-form-component-action',
            ]);
        });
    }
}
