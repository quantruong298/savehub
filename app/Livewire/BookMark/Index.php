<?php

namespace App\Livewire\BookMark;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.book-mark.index')->layout('client-view.layouts.dashboard');
    }
}
