<?php

namespace App\Livewire\Folders\Bookmarks\Components;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Add extends Component
{

    public $title;
    public $url;
    public $description;
    public $tags;
    public $folderId;
    public $folderName;
    public $addModalVisible = false;
    public $createNewBookmarkModalVisible = false;
    public $addExistingBookmarkModalVisible = false;
    public $bookmarksWithoutFolder = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string|max:255', // tags as comma-separated string
    ];


    public function getFolderName(){
        $this->folderName = Folder::where('id', $this->folderId)
            ->where('user_id', auth()->id())
            ->value('name');
    }

    public function getBookmarksWithoutFolder(){
        $this->bookmarksWithoutFolder = Bookmark::whereNull('folder_id')
        ->where('user_id', auth()->id())
        ->get();
    }

    #[On('addBookmarkRequest')]
    public function openAddModal(){
        $this->getFolderName();
        $this->addModalVisible = true;
    }

    public function closeAddModal(){
        $this->addModalVisible = false;
        // $this->reset();
    }

    public function openCreateNewBookmarkModal()
    {
        $this->addModalVisible = false;
        $this->createNewBookmarkModalVisible = true;
    }

    public function closeCreateNewBookmarkModal()
    {
        $this->addModalVisible = true;
        $this->createNewBookmarkModalVisible = false;
    }

    public function openAddExistingBookmarkModal()
    {
        $this->getBookmarksWithoutFolder();
        $this->addModalVisible = false;
        $this->addExistingBookmarkModalVisible = true;
    }

    public function closeAddExistingBookmarkModal()
    {
        $this->addModalVisible = true;
        $this->addExistingBookmarkModalVisible = false;
    }


    public function closeAllModals(){
        $this->addExistingBookmarkModalVisible = false;
        $this->createNewBookmarkModalVisible = false;
        $this->addModalVisible = false;  
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

    public function createBookmarkInFolder()
    {
        $this->validate();

        $bookmarkData = [
            'user_id' => Auth::id(),
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'folder_id' =>$this->folderId,
        ];
        $bookmark = Bookmark::create($bookmarkData);
        
        // Handle tags if provided
        if ($this->tags) {
            $this->handleTagsFieldForCreate($bookmark);
        }

        $this->reset(['title', 'url', 'description', 'tags']);
        $this->resetValidation();
        $this->closeAllModals();
        $this->dispatch('notify', message: 'Bookmark created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.folders.bookmarks.components.add');
    }
}
