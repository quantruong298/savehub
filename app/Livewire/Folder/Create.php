<?php

namespace App\Livewire\Folder;

use Livewire\Component;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{

    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];



    public function save()
    {
        
        $this->validate();

        Folder::create([
            'user_id' => Auth::id(),
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('close-modal');
        $this->dispatch('notify', message: 'Folder created successfully!', action: 'create', status: 'success');
    }

    public function render()
    {
        return view('livewire.folder.create');
    }
}
