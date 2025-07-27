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
                <button type="button" wire:click="openAddExistingBookmarkModal()"
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
                <h2 class="text-xl font-semibold text-gray-900">Create New Bookmark</h2>
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
    <div x-show="$wire.addExistingBookmarkModalVisible" x-transition
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/20 backdrop-blur-sm">
        <div @click.away="$wire.closeAddModal()"
            class="bg-white rounded-lg shadow-xl w-full max-w-lg max-h-[90vh] flex flex-col p-0">
    
            <!-- Modal Header (fixed) -->
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-900">Add Existing Bookmark</h2>
                <button wire:click="closeAddExistingBookmarkModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
    
            <!-- Scrollable List Content -->
            <div class="overflow-y-auto flex-1 px-6 py-4 bg-white">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    @foreach ($bookmarksWithoutFolder as $bookmark)
                    <div class="relative p-6 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
                        <div class="flex items-start space-x-4">
                            @php
                            $domain = parse_url($bookmark->url, PHP_URL_HOST);
                            $faviconUrl = $domain
                            ? "https://www.google.com/s2/favicons?domain={$domain}&sz=64"
                            :
                            "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+";
                            @endphp
                            <img src="{{ $faviconUrl }}" alt="Favicon" class="h-6 w-6 rounded-sm flex-shrink-0"
                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                                            {{ $bookmark->title }}
                                        </h3>
                                        <p class="text-sm text-blue-600 truncate mb-2">
                                            {{ $bookmark->url }}
                                        </p>
                                        <p class="text-gray-600 text-sm mb-3">
                                            {{ $bookmark->description }}
                                        </p>
                                        <div class="flex flex-wrap gap-2 mb-2">
                                            @forelse ($bookmark->tags as $tag)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $tag->name }}
                                            </span>
                                            @empty
                                            <span class="text-xs text-gray-400">No tags</span>
                                            @endforelse
                                        </div>
                                        {{-- <p class="text-xs text-gray-500">Saved on {{ $bookmark->created_at }}</p> --}}
                                    </div>
                                    <div class="flex items-center space-x-2 ml-4">
                                        <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer"
                                            title="Open in new tab">
                                            <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none"
                                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14 3h7m0 0v7m0-7L10 14M5 10v11h11" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- Bottom-right checkbox -->
                        <div class="absolute bottom-3 right-3">
                            <input type="checkbox" 
                                   wire:click="toggleBookmarkSelection({{ $bookmark->id }})"
                                   class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Modal Footer (fixed) -->
            <div class="px-6 py-4 border-t flex flex-col sm:flex-row justify-center gap-2 bg-white">
                <button type="button" wire:click="closeAddExistingBookmarkModal()"
                    class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                    Cancel
                </button>
                <button type="button" wire:click="addExistingBookmarksToFolder()"
                    class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    Add Bookmarks
                </button>
            </div>
        </div>
    </div>
</div>