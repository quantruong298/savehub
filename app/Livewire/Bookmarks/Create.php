<?php

namespace App\Livewire\Bookmarks;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\Folder;
use App\Models\Tag;
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

    public function handleTagsFieldForCreate($bookmark){
        // Sync tags
        $tagNames = collect(explode(',', $this->tags))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->unique();
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = Tag::firstOrCreate([
                'name' => $tagName,
                'user_id' => Auth::id(),
            ]);
            $tagIds[] = $tag->id;
        }
        $bookmark->tags()->sync($tagIds);
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

        $bookmark = Bookmark::create($bookmarkData);
        
        // Handle tags if provided
        if ($this->tags) {
            $this->handleTagsFieldForCreate($bookmark);
        }

        $this->reset(['title', 'url', 'description', 'folder_id', 'tags']);
        $this->resetValidation();
        $this->closeCreateModal();
        $this->dispatch('notify', message: 'Bookmark created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.bookmarks.create');
    }
}