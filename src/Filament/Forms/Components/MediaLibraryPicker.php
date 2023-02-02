<?php

namespace Hup234design\FilamentCms\Filament\Forms\Components;

use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Hup234design\FilamentCms\Models\Gallery;
use Hup234design\FilamentCms\Models\GalleryImage;
use Hup234design\FilamentCms\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class MediaLibraryPicker extends Component implements HasTable
{
    use InteractsWithTable;

    public MediaLibrary $selectedMedia;

    public $statePath;

    public $modalId;

    public $recordId;

    public $isGallery;

    protected function getTableQuery(): Builder
    {
        return MediaLibrary::query()->originals();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\ImageColumn::make('thumbnail_url')
                ->label('Image')
                ->size('100%')
                ->action(function (MediaLibrary $record): void {
                    $this->selectMediaLibraryImage($record);
                }),
        ];
    }

    protected function getTableContentGrid(): ?array
    {
        return [
            'sm' => 2,
            'md' => 3,
            'lg' => 4,
            'xl' => 4,
        ];
    }

    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function mount()
    {
        $this->selectedMedia = MediaLibrary::make();
    }

    public function render()
    {
        return view('filament-cms::filament.forms.components.media-library-picker');
    }

    public function selectMediaLibraryImage(MediaLibrary $media) {
        $this->selectedMedia = $media;
    }

    public function useSelected(): void
    {
        if( $this->isGallery) {
            $galleryImage = GalleryImage::create(['gallery_id' => $this->recordId]);
            $galleryImage->syncMedia($this->selectedMedia, 'gallery_image');
            $this->dispatchBrowserEvent('use-selected', ['media' => null, 'statePath' => $this->statePath]);
            $this->emit('galleryUpdated');
        } else {
            $this->dispatchBrowserEvent('use-selected', ['media' => $this->selectedMedia, 'statePath' => $this->statePath]);
        }
    }

}
