<?php

namespace App\Livewire\Bookmark;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Read extends Component
{
    use WithPagination;

    public function sendRequestToCreateBookmark(){
        $this->dispatch('createBookmarkRequest');
    }

    public function sendRequestToUpdateBookmark($bookmarkId){
        $this->dispatch('updateBookmarkRequest', id: $bookmarkId);
    }


    #[On('notify')]
    public function refreshList($action, $status)
    {
        if ($status === 'success') {
            // This will trigger a re-render
            $this->resetPage(); // Optional: reset to first page if paginated
        }
    }

    public function render()
    {
        $bookmarks = Bookmark::where('user_id', auth()->id())
            ->with('tags')
            ->latest()
            ->paginate(6);
        return view('livewire.bookmark.read', [
            'bookmarks' => $bookmarks,
        ]);
    }
}
