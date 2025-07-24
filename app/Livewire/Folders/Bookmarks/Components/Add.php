<?php

namespace App\Livewire\Folders\Bookmarks\Components;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Folder;

class Add extends Component
{

    public $folderId;
    public $folderName;
    public $addModalVisible = false;
    public $createNewBookmarkModalVisible = false;


    public function getFolderName(){
        $this->folderName = Folder::where('id', $this->folderId)
            ->where('user_id', auth()->id())
            ->value('name');
    }

    #[On('addBookmarkRequest')]
    public function openAddModal(){
        $this->getFolderName();
        $this->addModalVisible = true;
    }

    public function closeAddModal(){
        $this->addModalVisible = false;
        $this->reset();
    }

    public function openCreateNewBookmarkModal()
    {
        $this->addModalVisible = false;
        $this->createNewBookmarkModalVisible = true;
    }

    public function closeCreateNewBookmarkModal()
    {
        $this->addModalVisible = true;
        $this->createNewBookmarkModalVisible = false;
    }

    public function closeAllModals(){
        $this->createNewBookmarkModalVisible = false;
        $this->addModalVisible = false;  
    }

    public function render()
    {
        return view('livewire.folders.bookmarks.components.add');
    }
}
