<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Livewire\Component;

class ContentBlock extends Component
{
    public function mount($data): void{
        $this->data = $data;
    }
}
