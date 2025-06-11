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

    public function mount(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
        $this->title = $bookmark->title;
        $this->url = $bookmark->url;
        $this->description = $bookmark->description;
    }


    public function render()
    {
        return view('livewire.book-mark.edit');
    }
}