<?php
namespace App\Livewire\BookMark;

use Livewire\Component;
use App\Models\Bookmark;
use Livewire\Attributes\On;

class Edit extends Component
{
    public $bookmark = null;
    public $title;
    public $url;
    public $description;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
    ];

    #[On('openBookmarkModal')]
    public function openModal($id)
    {
        $this->bookmark = Bookmark::with('tags', 'folder')->find($id);
        
        if ($this->bookmark) {
            $this->title = $this->bookmark->title;
            $this->url = $this->bookmark->url;
            $this->description = $this->bookmark->description;
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->bookmark = null;
        $this->reset(['title', 'url', 'description']);
    }

    public function update()
    {
        $this->validate();

        $this->bookmark->update([
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
        ]);

        session()->flash('success', 'Bookmark updated successfully!');
        $this->closeModal();
        $this->dispatch('bookmark-updated');
    }

    public function render()
    {
        return view('livewire.bookmark.edit');
    }
}