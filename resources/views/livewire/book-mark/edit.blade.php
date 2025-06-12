<div class="gap-2">
    <flux:modal.trigger name="edit-bookmark-{{ $bookmark->id }}">
        <flux:button color="primary" size="sm" class="gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.586-6.586a2 2 0 112.828 2.828L11.828 15.828a2 2 0 01-2.828 0L9 13zm0 0V17h4" />
            </svg>
            Edit
        </flux:button>
    </flux:modal.trigger>
    <flux:modal name="edit-bookmark-{{ $bookmark->id }}" class="md:w-[600px] w-full">
        <form wire:submit.prevent="update">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Edit Bookmark</flux:heading>
                    <flux:text class="mt-2">Update details for your bookmark.</flux:text>
                </div>
                <flux:input 
                    label="Title" 
                    placeholder="Bookmark title" 
                    wire:model="title"
                    required 
                />
                <flux:input 
                    label="URL" 
                    placeholder="https://example.com" 
                    wire:model="url" 
                    type="url" 
                    required 
                />
                <flux:textarea 
                    label="Description" 
                    placeholder="Short description" 
                    wire:model="description" 
                />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div>