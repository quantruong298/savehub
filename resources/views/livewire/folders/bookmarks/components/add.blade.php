<div>
    <!-- Add Bookmark Modal -->
    <div x-show="$wire.addModalVisible" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm">
        <!-- Modal Content -->
        <div @click.away="$wire.closeAddModal()"
            class="bg-white rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Add Bookmark</h2>
                <button wire:click="closeAddModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Footer Buttons (Centered) -->
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-2">
                <button type="button" wire:click=""
                    class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Add Existing Bookmark
                </button>
                <button type="button" wire:click="openCreateNewBookmarkModal()"
                    class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Create New Bookmark
                </button>
            </div>
        </div>
    </div>
    <!-- Create New Bookmark Modal -->
    <div x-show="$wire.createNewBookmarkModalVisible" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm">
        <!-- Modal Content -->
        <div @click.away="$wire.closeAllModals()"
            class="bg-white rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">Create Bookmark</h2>
                <button wire:click="closeCreateNewBookmarkModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form wire:submit="createBookmarkInFolder()" class="space-y-4">
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
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                        Title
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" id="title" wire:model="title" placeholder="Enter bookmark title" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-1">
                        URL
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="url" id="url" wire:model="url" placeholder="https://example.com" required
                        class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" wire:model="description" placeholder="Brief description of the bookmark"
                        rows="3"
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
                    <label for="folder" class="block text-sm font-medium text-gray-700 mb-1">Folder</label>
                    <select id="folder" disabled
                        class="w-full border border-gray-300 rounded-md p-2 bg-gray-100 text-gray-700">
                        <option>{{ $folderName }}</option>
                    </select>

                </div>

                <!-- Footer Buttons -->
                <div class="mt-6 flex flex-col sm:flex-row justify-end gap-2">
                    <button type="button" wire:click="closeCreateNewBookmarkModal()"
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