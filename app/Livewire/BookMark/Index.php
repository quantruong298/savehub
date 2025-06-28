<?php

namespace App\Livewire\BookMark;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;

    public ?string $successMessage = null;
    public string $viewMode = 'grid'; // 'grid' or 'list'

    #[On('bookmark-added')]
    public function updateList(string $message)
    {
        $this->resetPage();
        $this->successMessage = $message;
    }

    public function setViewMode(string $mode)
    {
        $this->viewMode = $mode;
    }

    public function showDetails($bookmarkId)
    {
        $this->dispatch('openBookmarkModal', id: $bookmarkId);
    }

    public function render()
    {
        $bookmarks = Bookmark::where('user_id', auth()->id())
            ->with('tags')
            ->latest()
            ->paginate(6);
        return view('livewire.bookmark.index', [
            'bookmarks' => $bookmarks,
        ])->layout('layouts.dashboard');
    }
}
