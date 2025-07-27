<?php

namespace App\Livewire\Folders\Bookmarks\Components;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Remove extends Component
{
    public $folderId;
    public $folderName;
    public $bookmark;
    public $removeBookmarkModalVisible = false;

    public function getFolderName(){
        $this->folderName = Folder::where('id', $this->folderId)
            ->where('user_id', auth()->id())
            ->value('name');
    }

    public function getBookmarkData($bookmarkId){
        $this->bookmark = Bookmark::find($bookmarkId);
    }

    #[On('removeBookmarkRequest')]
    public function openRemoveBookmarkModal($id){
        $this->getFolderName();
        $this->getBookmarkData($id);
        $this->removeBookmarkModalVisible = true;
    }

    public function closeRemoveBookmarkModal(){
        $this->removeBookmarkModalVisible = false;
    }

    
    public function removeBookmarkFromFolder(){
        
    }

    public function render()
    {
        return view('livewire.folders.bookmarks.components.remove');
    }
}
