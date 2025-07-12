<?php

namespace App\Livewire\Bookmark;

use Livewire\Component;
use App\Models\Bookmark;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $title;
    public $url;
    public $description;
    public $tags;
    public $folder;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string|max:255', // tags as comma-separated string
        'folder' => 'nullable|in:work,personal,resources,reading,inspiration',
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
        $this->dispatch('close-modal');
        $this->dispatch('notify', message: 'Bookmark created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.bookmark.create');
    }
}