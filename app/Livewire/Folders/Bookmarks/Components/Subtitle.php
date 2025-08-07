<?php

namespace App\Livewire\Folders\Bookmarks\Components;

use Livewire\Component;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class Subtitle extends Component
{
    public $folderId;
    public $folder = null;

    public function mount()
    {
        $this->getCurrentFolder();
    }

    public function getCurrentFolder(){
        $this->folder = Folder::where('id', $this->folderId)
        ->where('user_id', auth()->id())
        ->withCount('bookmarks')
        ->firstOrFail();
    }

    public function sendRequestToCloseFolder()
    {
        $this->dispatch('closeFolderRequest');
    }
    
    public function render()
    {
        return view('livewire.folders.bookmarks.components.subtitle');
    }
}
