<?php

namespace App\Livewire\Folders\Manage;

use Livewire\Component;
use App\Models\Folder;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{

    public $name;
    public $modalVisible = false;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function closeCreateModal(){
        $this->modalVisible = false;
        $this->resetValidation();
    }

    public function openCreateModal(){
        $this->modalVisible = true;
    }

    #[On('createFolderRequest')]
    public function openFolderCreateForm()
    {
        $this->openCreateModal();
    }

    public function createFolder()
    {
        
        $this->validate();

        Folder::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
        ]);
        $this->reset();
        $this->resetValidation();
        $this->dispatch('notify', message: 'Folder created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.folders.manage.create');
    }
}
