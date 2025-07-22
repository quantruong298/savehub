<?php

namespace App\Livewire\Folder\Bookmarks;

use Livewire\Component;

class Read extends Component
{
    public $folderId;
    
    public function sendRequestToCloseFolder()
    {
        $this->dispatch('closeFolderRequest');
    }

    public function render()
    {
        return view('livewire.folder.bookmarks.read');
    }
}
