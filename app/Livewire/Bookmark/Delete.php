<?php

namespace App\Livewire\Bookmark;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Bookmark;

class Delete extends Component
{

    public $bookmark;
    public $modalVisible = false;

    public function closeDeleteModal(){
        $this->modalVisible= false;
    }

    public function openDeleteModal(){
        $this->modalVisible = true;
    }

    #[On('deleteBookmarkRequest')]
    public function openDeleteConfirmModal($id)
    {
        $this->bookmark = Bookmark::find($id);
        $this->openDeleteModal();
    }

    public function deleteBookmark()
    {
        $this->bookmark->delete();
        // $this->dispatch('bookmark-deleted')->to(Update::class);
        $this->dispatch('notify', message: 'Bookmark deleted successfully!', action: 'delete', status: 'success');
        
    }

    public function render()
    {
        return view('livewire.bookmark.delete');
    }
}
