<?php

namespace App\Livewire\BookMark;

use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $bookmarks;

    public function mount()
    {
        $this->bookmarks = Bookmark::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.book-mark.index')->layout('client-view.layouts.dashboard');
    }
}
