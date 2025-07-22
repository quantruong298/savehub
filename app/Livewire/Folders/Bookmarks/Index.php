<?php

namespace App\Livewire\Folders\Bookmarks;

use Livewire\Component;


class Index extends Component
{
    public $folderId;
    
    public function render()
    {
        return view('livewire.folders.bookmarks.index');
    }
}
