<?php

namespace App\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;

class Index extends Component
{   
    public $bookmarksVisible = false;

    #[On('openFolderRequest')]
    public function openFolder($id)
    {
        if(Folder::where('id', $id)->exists()){
            $this->bookmarksVisible = true;
        }
    }

    #[On('closeFolderRequest')]
    public function closeFolder()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.folder.index');
    }
}
