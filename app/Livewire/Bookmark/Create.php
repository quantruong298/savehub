<?php

namespace App\Livewire\Bookmark;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $title;
    public $url;
    public $description;
    public $tags;
    public $folder_id;
    public $modalVisible = false;
    public $folders = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string|max:255', // tags as comma-separated string
        'folder_id' => 'nullable|exists:folders,id',
    ];

    public function mount()
    {
        $this->loadUserFolders();
    }

    public function loadUserFolders()
    {
        $this->folders = Folder::where('user_id', Auth::id())
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function closeCreateModal(){
        $this->resetValidation();
        $this->modalVisible = false;
    }

    public function openCreateModal(){
        $this->loadUserFolders();       // Refresh folders when opening modal
        $this->modalVisible = true;
    }

    #[On('createBookmarkRequest')]
    public function openBookmarkCreateForm()
    {
        $this->openCreateModal();
    }

    public function createBookmark()
    {
        $this->validate();

        $bookmarkData = [
            'user_id' => Auth::id(),
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
        ];

        // Add folder_id if selected
        if ($this->folder_id) {
            $bookmarkData['folder_id'] = $this->folder_id;
        }

        Bookmark::create($bookmarkData);

        $this->reset(['title', 'url', 'description', 'folder_id']);
        $this->resetValidation();
        $this->closeCreateModal();
        $this->dispatch('notify', message: 'Bookmark created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.bookmark.create');
    }
}