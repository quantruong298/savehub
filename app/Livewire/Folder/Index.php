<?php

namespace App\Livewire\Folder;

use Livewire\Component;

class Index extends Component
{

    public function render()
    {
        return view('livewire.folder.index')->layout('dashboard.folders');
    }
}
