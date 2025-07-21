<?php

namespace App\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;

class Index extends Component
{   
    public ?Folder $folder = null;

    #[On('openFolderRequest')]
    public function openFolder($id)
    {
        $this->folder = Folder::find($id);
    }

    #[On('closeFolderRequest')]
    public function closeFolder()
    {
        $this->folder = null;
    }

    public function render()
    {
        return view('livewire.folder.index');
    }
}
