<!-- Modal Background -->
<div x-show="$wire.showModal" x-transition x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/20"
    @keydown.escape.window="$wire.closeModal()">
    <!-- Modal Content -->
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-10">
        <!-- Close X -->
        <button @click="$wire.closeModal()" class="absolute top-6 right-6 text-2xl text-gray-400 hover:text-gray-600"
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
            <button @click="$wire.closeModal()"
                class="px-5 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">Close</button>
            <button
                class="px-5 py-2 rounded-lg border border-gray-300 bg-white text-gray-700 font-medium hover:bg-gray-50 transition">Edit</button>
            <button
                class="px-5 py-2 rounded-lg bg-red-500 text-white font-medium hover:bg-red-600 transition">Delete</button>
        </div>
        @endif
    </div>
</div>