<!-- Alpine.js for open/close -->
<div x-data="{ open: false }">
    <button @click="open = true" class="px-4 py-2 bg-blue-600 text-white rounded shadow">
        Open Bookmark Modal
    </button>
    <!-- Modal Background -->
    <div x-show="open" x-transition x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/20"
        @keydown.escape.window="open = false">
        <!-- Modal Content -->
        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-10">
            <!-- Close X -->
            <button @click="open = false" class="absolute top-6 right-6 text-2xl text-gray-400 hover:text-gray-600"
                aria-label="Close">&times;</button>
            <!-- Title -->
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Bookmark Details</h2>
            <!-- Bookmark Main Row -->
            <div class="flex items-center gap-4 mb-8">
                <img src="https://react.dev/favicon.ico" alt="Favicon" class="h-8 w-8 rounded-sm flex-shrink-0 mt-1"
                    onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+'" />
                <div>
                    <div class="text-xl font-semibold text-gray-900">React Documentation</div>
                    <a href="https://react.dev" class="text-blue-600 text-base hover:underline">https://react.dev</a>
                </div>
            </div>
            <!-- Details -->
            <div class="space-y-7">
                <!-- Description -->
                <div>
                    <div class="text-base font-semibold text-gray-800 mb-1">Description</div>
                    <div class="text-gray-600 text-base">The official React documentation with guides and API reference
                    </div>
                </div>
                <!-- Tags -->
                <div>
                    <div class="text-base font-semibold text-gray-800 mb-2">Tags</div>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700">React</span>
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700">Documentation</span>
                        <span
                            class="px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700">Frontend</span>
                    </div>
                </div>
                <!-- Folder -->
                <div>
                    <div class="text-base font-semibold text-gray-800 mb-1">Folder</div>
                    <div class="text-gray-600 text-base">Work</div>
                </div>
                <!-- Saved Date -->
                <div>
                    <div class="text-base font-semibold text-gray-800 mb-1">Saved Date</div>
                    <div class="text-gray-600 text-base">January 15, 2024</div>
                </div>
            </div>
            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-10">
                <button @click="open = false"
                    class="px-5 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">Close</button>
                <button
                    class="px-5 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">Edit</button>
                <button
                    class="px-5 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition">Delete</button>
            </div>
        </div>
    </div>
</div>


{{-- <div class="gap-2">
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
</div> --}}