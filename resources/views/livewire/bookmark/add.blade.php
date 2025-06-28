<div x-data="{ isOpen: false }" @close-modal.window="isOpen = false">
    <!-- Floating Add Button -->
    <button @click="isOpen = true"
        class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 z-40">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
    </button>

    <!-- Modal Background -->
    <div x-show="isOpen" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm">
        <!-- Modal Content -->
        <div @click.away="isOpen = false"
            class="bg-white rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Add Bookmark</h2>
                <button @click="isOpen = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form wire:submit.prevent="save" class="space-y-4">
                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-50 text-red-500 p-4 rounded-md mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" id="title" wire:model="title" placeholder="Enter bookmark title"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                    <input type="url" id="url" wire:model="url" placeholder="https://example.com"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" wire:model="description" placeholder="Brief description of the bookmark" rows="3"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Tags -->
                <div>
                    <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                    <input type="text" id="tags" wire:model="tags" placeholder="Enter tags separated by commas"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Folder -->
                <div>
                    <label for="folder" class="block text-sm font-medium text-gray-700 mb-1">Folder (Optional)</label>
                    <select id="folder" wire:model="folder"
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled selected>Select a folder</option>
                        <option value="work">Work</option>
                        <option value="personal">Personal</option>
                        <option value="resources">Resources</option>
                        <option value="reading">Reading List</option>
                        <option value="inspiration">Inspiration</option>
                    </select>
                </div>

                <!-- Footer Buttons -->
                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-2">
                    <button type="button" @click="isOpen = false"
                        class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Save Bookmark
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>