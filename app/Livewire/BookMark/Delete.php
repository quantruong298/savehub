<?php

namespace App\Livewire\Bookmark;
use Livewire\Attributes\On;
use Livewire\Component;

class Delete extends Component
{

    public $bookmark;
    public $showConfirmDeleteModal = false;

    #[On('confirmDelete')]
    public function openConfirmDeleteModal($id)
    {
        $this->bookmark = \App\Models\Bookmark::find($id);
        $this->showConfirmDeleteModal = true;
    }

    public function closeModal()
    {
        $this->showConfirmDeleteModal = false;
    }

    public function delete()
    {
        $this->bookmark->delete();
        $this->dispatch('bookmarkDeleted', ['id' => $this->bookmark->id]);
        session()->flash('success', 'Bookmark deleted successfully!');
    }

    public function render()
    {
        return view('livewire.bookmark.delete');
    }
}
