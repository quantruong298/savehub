<?php

namespace App\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    public $folder = null;
    public $name;
    public $showUpdateForm = false;


    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    #[On('updateFolderRequest')]
    public function openFolderUpdateForm($id)
    {
        $this->folder = Folder::find($id);
        
        if ($this->folder) {
            $this->name = $this->folder->name;
            $this->showUpdateForm = true;
        }
    }

    public function render()
    {
        return view('livewire.folder.update');
    }
}
