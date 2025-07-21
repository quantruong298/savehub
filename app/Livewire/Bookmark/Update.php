<?php
namespace App\Livewire\Bookmark;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\Tag;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    public $bookmark = null;
    public $title;
    public $url;
    public $description;
    public $tags;
    public $folder_id;
    public $modalVisible = false;
    public $updateFormVisible = false;
    public $folders = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string',
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

    public function closeUpdateModal(){
        // $this->updateFormVisible = false;
        // $this->modalVisible = false;
        $this->reset();
        $this->resetValidation();
        $this->loadUserFolders();
    }

    public function openUpdateModal(){
        $this->loadUserFolders(); 
        $this->modalVisible = true;
    }

    public function openUpdateForm(){
        $this->updateFormVisible = true;
    }

    public function closeUpdateForm(){
        $this->updateFormVisible = false;
    }

    #[On('updateBookmarkRequest')]
    public function openUpdateModalWithDetails($id)
    {
        $this->bookmark = Bookmark::with('tags', 'folder')->find($id);
        
        if ($this->bookmark) {
            $this->title = $this->bookmark->title;
            $this->url = $this->bookmark->url;
            $this->description = $this->bookmark->description;
            $this->tags = $this->bookmark->tags->pluck('name')->implode(', ');
            $this->folder_id = $this->bookmark->folder_id;
            $this->openUpdateModal();
        }
    }

    public function handleTagsFieldForUpdate(){
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
        $this->bookmark->tags()->sync($tagIds);
    }

    public function updateBookmark()
    {
        $this->validate();

        $this->bookmark->update([
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'folder_id' => $this->folder_id ?: null,
        ]);

        $this->handleTagsFieldForUpdate();
        $this->closeUpdateModal();
        $this->dispatch('notify', message: 'Bookmark updated successfully!', action: 'udpate', status: 'success');
    }

    public function sendRequestToDeleteBookmark($bookmarkId){
        $this->closeUpdateModal();
        $this->dispatch('deleteBookmarkRequest', id: $bookmarkId);
    }

    public function render()
    {
        return view('livewire.bookmark.update');
    }
}