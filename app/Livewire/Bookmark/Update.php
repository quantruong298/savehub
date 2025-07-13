<?php
namespace App\Livewire\Bookmark;

use Livewire\Component;
use App\Models\Bookmark;
use App\Models\Tag;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    public $bookmark = null;
    public $title;
    public $url;
    public $description;
    public $tags;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
        'tags' => 'nullable|string',
    ];

    #[On('openBookmarkModal')]
    public function openModal($id)
    {
        $this->bookmark = Bookmark::with('tags', 'folder')->find($id);
        
        if ($this->bookmark) {
            $this->title = $this->bookmark->title;
            $this->url = $this->bookmark->url;
            $this->description = $this->bookmark->description;
            $this->tags = $this->bookmark->tags->pluck('name')->implode(', ');
            $this->showModal = true;
        }
    }

<<<<<<< Updated upstream
    public function closeModal()
    {
        $this->showModal = false;
        $this->bookmark = null;
        $this->reset(['title', 'url', 'description', 'tags']);
=======
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
>>>>>>> Stashed changes
    }

    public function updateBookmark()
    {
        $this->validate();

        $this->bookmark->update([
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
        ]);

<<<<<<< Updated upstream
        // Sync tags
        $tagNames = collect(explode(',', $this->tags))
            ->map(fn($tag) => trim($tag))
            ->filter()
            ->unique();
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tag = \App\Models\Tag::firstOrCreate([
                'name' => $tagName,
                'user_id' => Auth::id(),
            ]);
            $tagIds[] = $tag->id;
        }
        $this->bookmark->tags()->sync($tagIds);

        session()->flash('success', 'Bookmark updated successfully!');
        $this->closeModal();
        $this->dispatch('bookmark-updated');
=======
        $this->handleTagsFieldForUpdate();
        $this->closeUpdateModal();
        $this->dispatch('notify', message: 'Bookmark updated successfully!', action: 'udpate', status: 'success');
>>>>>>> Stashed changes
    }

    public function confirmDelete()
    {
        if ($this->bookmark) {
            $this->dispatch('confirmDelete', id: $this->bookmark->id);
        }
    }

    public function render()
    {
        return view('livewire.bookmark.update');
    }
}