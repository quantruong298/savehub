<?php

namespace App\Livewire\BookMark;

use Livewire\Component;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class Add extends Component
{
    public $title;
    public $url;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Bookmark::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
        ]);

        $this->reset(['title', 'url', 'description']);
        session()->flash('success', 'Bookmark added successfully!');
        $this->dispatch('close-modal', name: 'add-bookmark');
        $this->dispatch('bookmark-added');
        // Optionally, you can emit an event to parent to refresh the index
        $this->redirect(request()->header('Referer') ?? route('client.dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.bookmark.add');
    }
}