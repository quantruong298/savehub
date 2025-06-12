<?php
namespace App\Livewire\BookMark;

use Livewire\Component;
use App\Models\Bookmark;

class Edit extends Component
{
    public $bookmark;
    public $title;
    public $url;
    public $description;

    protected $rules = [
        'title' => 'required|string|max:255',
        'url' => 'required|url|max:255',
        'description' => 'nullable|string',
    ];

    public function mount(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
        $this->title = $bookmark->title;
        $this->url = $bookmark->url;
        $this->description = $bookmark->description;
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
        $this->dispatch('close-modal', name: 'edit-bookmark-' . $this->bookmark->id);
        $this->dispatch('bookmark-updated');
        $this->redirect(request()->header('Referer') ?? route('client.dashboard'), navigate: true);
    }

    public function render()
    {
        return view('livewire.bookmark.edit');
    }
}