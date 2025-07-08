<?php

namespace App\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;

    #[On('folder-created')]
    public function updateList()
    {
        $this->resetPage();
    }

    public function render()
    {
        $folders = Folder::where('user_id', auth()->id())
            ->withCount('bookmarks')
            ->latest()
            ->paginate(8);
        return view('livewire.folder.read', [
            'folders' => $folders,
        ]);
    }
}
