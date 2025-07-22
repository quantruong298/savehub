<?php

namespace App\Livewire\Folders\Manage;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    public $folder = null;
    public $name;
    public $modalVisible = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function closeUpdateModal(){
        $this->reset();
        $this->modalVisible = false;
    }

    public function openUpdateModal(){
        $this->modalVisible = true;
    }

    #[On('updateFolderRequest')]
    public function openFolderUpdateForm($id)
    {
        $this->folder = Folder::find($id);
        if ($this->folder) {
            $this->name = $this->folder->name;
            $this->openUpdateModal();
        }
    }

    public function updateFolder()
    {
        $this->validate();

        // Only update if trimmed name has actually changed (ignore trailing spaces)
        if (trim($this->name) !== trim($this->folder->name)) {
            $this->folder->update([
                'name' => $this->name,
            ]);
        }
        $this->closeUpdateModal();
        $this->dispatch('notify', message: 'Folder updated successfully!', action: 'update', status: 'success');
    }

    public function render()
    {
        return view('livewire.folders.manage.update');
    }
}
