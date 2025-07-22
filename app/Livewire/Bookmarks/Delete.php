<?php

namespace App\Livewire\Bookmarks;
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

    public function cancelDeleteBookmark(){
        $this->closeDeleteModal();
        $this->dispatch('updateBookmarkRequest', id: $this->bookmark->id)->to(Update::class);
    }

    public function deleteBookmark()
    {
        $this->bookmark->delete();
        $this->closeDeleteModal();
        $this->dispatch('notify', message: 'Bookmark deleted successfully!', action: 'delete', status: 'success');
        
    }

    public function render()
    {
        return view('livewire.bookmarks.delete');
    }
}
