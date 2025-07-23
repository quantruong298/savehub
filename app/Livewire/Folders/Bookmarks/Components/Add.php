<?php

namespace App\Livewire\Folders\Bookmarks\Components;

use Livewire\Component;
use Livewire\Attributes\On;

class Add extends Component
{

    public $addModalVisible = false;


    #[On('addBookmarkRequest')]
    public function openAddModal(){
        $this->addModalVisible = true;
    }

    public function closeAddModal(){
        $this->addModalVisible = false;
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.folders.bookmarks.components.add');
    }
}
