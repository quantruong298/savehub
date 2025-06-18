{{-- <div class="gap-2">
    <flux:modal.trigger name="add-bookmark">
        <flux:button color="success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add
        </flux:button>
    </flux:modal.trigger>
    <flux:modal name="add-bookmark" class="md:w-[600px] w-full">
        <form wire:submit.prevent="save">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Add Bookmark</flux:heading>
                    <flux:text class="mt-2">Enter details for your new bookmark.</flux:text>
                </div>
                <flux:input label="Title" placeholder="Bookmark title" wire:model.defer="title" required />
                <flux:input label="URL" placeholder="https://example.com" wire:model.defer="url" type="url" required />
                <flux:textarea label="Description" placeholder="Short description" wire:model.defer="description" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save</flux:button>
                </div>
            </div>
        </form>
    </flux:modal>
</div> --}}