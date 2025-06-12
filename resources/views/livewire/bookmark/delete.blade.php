<?php

use Livewire\Volt\Component;
use App\Models\Bookmark;

new class extends Component {

    public $bookmark;
    
    public function mount(Bookmark $bookmark)
    {
        $this->bookmark = $bookmark;
    }

    public function delete()
    {
        $this->bookmark->delete();
        $this->dispatch('bookmarkDeleted', ['id' => $this->bookmark->id]);
        session()->flash('success', 'Bookmark deleted successfully!');
        $this->redirect(request()->header('Referer') ?? route('client.dashboard'), navigate: true);
    }

}; ?>

<div>
    <flux:button color="primary" size="sm" class="gap-1" wire:click="delete">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V17h4" />
        </svg>
        Delete
    </flux:button>
</div>