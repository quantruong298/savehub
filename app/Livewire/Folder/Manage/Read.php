<?php

namespace App\Livewire\Folder\Manage;

use Livewire\Component;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Read extends Component
{
    use WithPagination;
    

    #[On('notify')]
    public function refreshList($action, $status)
    {
        if ($action === 'create' && $status === 'success') {
            // This will trigger a re-render
            $this->resetPage(); // Optional: reset to first page if paginated
        }
    }

    public function sendRequestToCreateFolder()
    {
        $this->dispatch('createFolderRequest');
    }

    public function sendRequestToUpdateFolder($folderId)
    {
        $this->dispatch('updateFolderRequest', id: $folderId);
    }

    public function sendRequestToDeleteFolder($folderId)
    {
        $this->dispatch('deleteFolderRequest', id: $folderId);
    }

    public function sendRequestToOpenFolder($folderId)
    {
        $this->dispatch('openFolderRequest', id: $folderId);
    }

    public function render()
    {
        $folders = Folder::where('user_id', auth()->id())
            ->withCount('bookmarks')
            ->latest()
            ->paginate(8);
        return view('livewire.folder.manage.read', [
            'folders' => $folders,
        ]);
    }
}
