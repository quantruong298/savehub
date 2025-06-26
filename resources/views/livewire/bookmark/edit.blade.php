<!-- Details/Edit Modal Background -->
<div x-data="{ showEdit: false }" x-show="$wire.showModal" x-transition x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/20"
    @keydown.escape.window="$wire.closeModal(); showEdit = false">
    <!-- Details Content -->
    <div x-show="!showEdit" class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-10">
        <!-- Close X -->
        <button @click="$wire.closeModal(); showEdit = false" class="absolute top-6 right-6 text-2xl text-gray-400 hover:text-gray-600"
            aria-label="Close">&times;</button>
        
        @if($bookmark)
        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Bookmark Details</h2>
        <!-- Bookmark Main Row -->
        <div class="flex items-center gap-4 mb-8">
            @php
                $domain = parse_url($bookmark->url, PHP_URL_HOST);
                $faviconUrl = $domain ? "https://{$domain}/favicon.ico" : "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+";
            @endphp
            <img src="{{ $faviconUrl }}" alt="Favicon" class="h-8 w-8 rounded-sm flex-shrink-0 mt-1"
                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+'" />
            <div>
                <div class="text-xl font-semibold text-gray-900">{{ $bookmark->title }}</div>
                <a href="{{ $bookmark->url }}" class="text-blue-600 text-base hover:underline">{{ $bookmark->url }}</a>
            </div>
        </div>
        <!-- Details -->
        <div class="space-y-7">
            <!-- Description -->
            <div>
                <div class="text-base font-semibold text-gray-800 mb-1">Description</div>
                <div class="text-gray-600 text-base">{{ $bookmark->description ?: 'No description provided' }}</div>
            </div>
            <!-- Tags -->
            <div>
                <div class="text-base font-semibold text-gray-800 mb-2">Tags</div>
                <div class="flex flex-wrap gap-2">
                    @forelse($bookmark->tags as $tag)
                        <span class="px-3 py-1 rounded-full text-sm font-medium bg-blue-50 text-blue-700">{{ $tag->name }}</span>
                    @empty
                        <span class="text-gray-500 text-sm">No tags</span>
                    @endforelse
                </div>
            </div>
            <!-- Folder -->
            <div>
                <div class="text-base font-semibold text-gray-800 mb-1">Folder</div>
                <div class="text-gray-600 text-base">{{ $bookmark->folder ? $bookmark->folder->name : 'No folder' }}</div>
            </div>
            <!-- Saved Date -->
            <div>
                <div class="text-base font-semibold text-gray-800 mb-1">Saved Date</div>
                <div class="text-gray-600 text-base">{{ $bookmark->created_at->format('F j, Y') }}</div>
            </div>
        </div>
        <!-- Buttons -->
        <div class="flex justify-end gap-3 pt-10">
            <button @click="$wire.closeModal(); showEdit = false"
                class="px-5 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">Close</button>
            <button @click="showEdit = true"
                class="px-5 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">Edit</button>
            <button
                class="px-5 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition">Delete</button>
        </div>
        @endif
    </div>
    <!-- Edit Content -->
    <div x-show="showEdit" class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-10">
       <!-- Close X -->
       <button @click="$wire.closeModal(); showEdit = false" class="absolute top-6 right-6 text-2xl text-gray-400 hover:text-gray-600"
       aria-label="Close">&times;</button>
        <!-- Dialog Header -->
        <div class="mb-4">
            <h2 class="text-xl font-semibold text-gray-900">Edit Bookmark</h2>
        </div>
    
        <!-- Form -->
        <form class="space-y-4 py-4">
            <!-- Title -->
            <div class="space-y-2">
                <label for="edit-title" class="text-sm font-medium text-gray-700 block">Title</label>
                <input id="edit-title" type="text" value="React Documentation"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <!-- URL -->
            <div class="space-y-2">
                <label for="edit-url" class="text-sm font-medium text-gray-700 block">URL</label>
                <input id="edit-url" type="url" value="https://react.dev"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <!-- Description -->
            <div class="space-y-2">
                <label for="edit-description" class="text-sm font-medium text-gray-700 block">Description</label>
                <textarea id="edit-description"
                    class="w-full min-h-[80px] border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="3">The official React documentation with guides and API reference</textarea>
            </div>
            <!-- Tags -->
            <div class="space-y-2">
                <label for="edit-tags" class="text-sm font-medium text-gray-700 block">Tags</label>
                <input id="edit-tags" type="text" value="React, Documentation, Frontend"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <!-- Folder Dropdown (Alpine.js) -->
            <div class="space-y-2"
                x-data="{ open: false, selected: null, options: ['Work', 'Personal', 'Resources', 'Reading List', 'Inspiration'] }">
                <label for="edit-folder" class="text-sm font-medium text-gray-700 block">Folder (Optional)</label>
                <div class="relative">
                    <button type="button"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 flex justify-between items-center focus:outline-none focus:ring-2 focus:ring-blue-500"
                        @click="open = !open">
                        <span x-text="selected ? selected : 'Select a folder' " class="text-gray-400"></span>
                        <svg class="w-4 h-4 ml-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" @click.away="open = false"
                        class="absolute left-0 z-20 w-full bg-white border border-gray-200 rounded-lg shadow-md mt-2"
                        style="display: none">
                        <template x-for="option in options" :key="option">
                            <li @click="selected = option; open = false"
                                :class="{'bg-blue-100': selected === option, 'hover:bg-gray-100': true}"
                                class="px-4 py-2 cursor-pointer" x-text="option"></li>
                        </template>
                    </ul>
                </div>
            </div>
        </form>
    
        <!-- Dialog Footer -->
        <div class="flex flex-col sm:flex-row gap-2 justify-end mt-6">
            <button type="button" @click="showEdit = false"
                class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-lg font-semibold hover:bg-gray-100">
                Cancel
            </button>
            <button type="submit"
                class="w-full sm:w-auto px-4 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700">
                Save Changes
            </button>
        </div>
    </div>
</div>



  