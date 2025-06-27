<?php

namespace App\Livewire\Bookmark;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Bookmark;

class Delete extends Component
{

    public $bookmark;
    public $showConfirmDeleteModal = false;

    #[On('confirmDelete')]
    public function openConfirmDeleteModal($id)
    {
        $this->bookmark = Bookmark::find($id);
        $this->showConfirmDeleteModal = true;
    }

    public function closeModal()
    {
        $this->showConfirmDeleteModal = false;
    }

    public function delete()
    {
        $this->bookmark->delete();
        session()->flash('success', 'Bookmark deleted successfully!');
    }

    public function render()
    {
        return view('livewire.bookmark.delete');
    }
}
