<?php

namespace App\Livewire\BookMark;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;


    public function render()
    {
        $bookmarks = Bookmark::where('user_id', auth()->id())
            ->latest()
            ->paginate(6);
        return view('livewire.bookmark.index', [
            'bookmarks' => $bookmarks,
        ])->layout('layouts.dashboard');
    }
}
