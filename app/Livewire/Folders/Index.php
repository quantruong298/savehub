<?php

namespace App\Livewire\Folders;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;

class Index extends Component
{   

    public $folderId = null;
    public $bookmarksVisible = false;

    #[On('openFolderRequest')]
    public function openFolder($id)
    {
        if(Folder::where('id', $id)->exists()){
            $this->folderId = $id;
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
        return view('livewire.folders.index');
    }
}
