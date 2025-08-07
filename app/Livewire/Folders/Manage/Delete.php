<?php

namespace App\Livewire\Folders\Manage;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Delete extends Component
{
    public $folder;
    public $modalVisible = false;

    public function closeDeleteModal(){
        $this->modalVisible = false;
    }

    public function openDeleteModal(){
        $this->modalVisible = true;
    }

    #[On('deleteFolderRequest')]
    public function openDeleteFolderComfirmation($id)
    {
        $this->folder = Folder::find($id);
        if($this->folder){
            $this->openDeleteModal();
        }
    }

    public function deleteFolder()
    {
        $this->folder->bookmarks()->update(['folder_id' => null]);
        $this->folder->delete();
        $this->closeDeleteModal();
        $this->dispatch('notify', message: 'Folder deleted successfully!', action: 'delete', status: 'success');
    }


    public function render()
    {
        return view('livewire.folders.manage.delete');
    }
}
