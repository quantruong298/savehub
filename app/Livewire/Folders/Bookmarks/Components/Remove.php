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
    public $bookmarkId;
    public $bookmarkTitle;
    public $removeBookmarkModalVisible = false;

    public function getFolderName(){
        $this->folderName = Folder::where('id', $this->folderId)
            ->where('user_id', auth()->id())
            ->value('name');
    }

    public function getBookmarkData($bookmarkId){
        $this->bookmarkId = $bookmarkId;
        $this->bookmarkTitle = Bookmark::where('id', $bookmarkId)
        ->where('user_id', auth()->id())
        ->value('title') ?? '';
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

    public function resetProperties(){
        $this->reset(['folderName', 'bookmarkId', 'bookmarkTitle', 'removeBookmarkModalVisible']);
    }

    public function removeBookmarkFromFolder(){
        $result = Bookmark::where('id', $this->bookmarkId)
        ->where('user_id', auth()->id())
        ->update(['folder_id' => null]);

        if ($result) {
            $this->resetProperties();
            $this->dispatch('notify', message: 'Bookmark removed from folder successfully!', action: 'remove', status: 'success');
        } else {
            $this->resetProperties();
            $this->dispatch('notify', message: 'Failed to remove bookmark from folder.', action: 'remove', status: 'fail');
        }
    }

    public function render()
    {
        return view('livewire.folders.bookmarks.components.remove');
    }
}
