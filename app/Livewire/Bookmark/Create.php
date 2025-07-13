<?php

namespace App\Livewire\Bookmark;

use Livewire\Component;
use App\Models\Bookmark;
<<<<<<< Updated upstream
=======
use App\Models\Folder;
use App\Models\Tag;
>>>>>>> Stashed changes
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $title;
    public $url;
    public $description;
    public $tags;
    public $folder;
    public $modalVisible = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string|max:255', // tags as comma-separated string
        'folder' => 'nullable|in:work,personal,resources,reading,inspiration',
    ];

    public function closeCreateModal(){
        $this->resetValidation();
        $this->modalVisible = false;
    }

    public function openCreateModal(){
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

        Bookmark::create([
            'user_id' => Auth::id(),
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
        ]);

<<<<<<< Updated upstream
        $this->reset(['title', 'url', 'description']);
=======
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
>>>>>>> Stashed changes
        $this->resetValidation();
        $this->closeCreateModal();
        $this->dispatch('notify', message: 'Bookmark created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.bookmark.create');
    }
}