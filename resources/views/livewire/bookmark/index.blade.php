<div>
    {{-- Success Message --}}
    @if ($successMessage)
        <div 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 2500)" 
            x-show="show" 
            x-transition:leave="transition ease-in duration-300" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0" 
            class="fixed top-6 right-6 z-50 flex items-center px-5 py-3 bg-green-500 text-white rounded-lg shadow-lg space-x-3"
            style="min-width: 220px;">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span class="font-medium">{{ $successMessage }}</span>
            <button @click="show = false" class="ml-2 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif

    @if ($bookmarks->isEmpty())
        <div class="flex flex-col items-center justify-center min-h-[60vh] text-center px-4">
            <!-- Icon -->
            <div class="mb-6">
                <div class="h-16 w-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <!-- Bookmark SVG icon (Heroicons outline version) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3-7 3V5z" />
                    </svg>
                </div>
            </div>
        
            <!-- Message -->
            <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                No bookmarks yet
            </h2>
        
            <!-- Description -->
            <p class="text-gray-600 mb-8 max-w-sm">
                Start saving your favorite links and organize your digital life.
            </p>
        
            <!-- Button -->
            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition-colors duration-200 shadow-lg hover:shadow-xl">
                + Add your first bookmark
            </button>
        </div>
    @else
        {{-- Bookmarks Display --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($bookmarks as $bookmark)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <!-- Bookmark Header -->
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3 flex-1 min-w-0">
                            @php
                            $domain = parse_url($bookmark->url, PHP_URL_HOST);
                            $faviconUrl = $domain
                            ? "https://www.google.com/s2/favicons?domain={$domain}&sz=64"
                            :
                            "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+";
                            @endphp
                            <img src="{{ $faviconUrl }}" alt="Favicon" class="h-6 w-6 rounded-sm flex-shrink-0"
                                onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                            <h3 class="text-lg font-semibold text-gray-900 truncate">
                                {{ $bookmark->title }}
                            </h3>
                        </div>
                        <a href="{{ $bookmark->url }}" target="_blank" rel="noopener noreferrer" title="Open in new tab">
                            <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7m0 0v7m0-7L10 14M5 10v11h11" />
                            </svg>
                        </a>
                    </div>
        
                    <!-- URL -->
                    <p class="text-sm text-blue-600 mb-2 truncate">
                        {{ $bookmark->url }}
                    </p>
        
                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                        {{ $bookmark->description ?: '(No Descriptions)' }}
                    </p>
        
                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @forelse ($bookmark->tags as $tag)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $tag->name }}
                        </span>
                        @empty
                        <span class="text-xs text-gray-400">(No tags)</span>
                        @endforelse
                    </div>
        
        
                    <!-- Date and More Button -->
                    <div class="flex items-center justify-between">
                        <p class="text-xs text-gray-500">
                            Saved on {{ $bookmark->created_at }}
                        </p>
                        <button wire:click="showDetails({{ $bookmark->id }})"
                            class="p-1 rounded-full hover:bg-gray-100 transition-colors duration-200" type="button">
                            <!-- Replace below with your MoreHorizontal SVG icon -->
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <circle cx="5" cy="12" r="1.5" />
                                <circle cx="12" cy="12" r="1.5" />
                                <circle cx="19" cy="12" r="1.5" />
                            </svg>
                        </button>
                    </div>
        
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8 flex justify-center">
            <nav class="flex items-center space-x-2" aria-label="Pagination">
                {{-- Previous --}}
                @if ($bookmarks->onFirstPage())
                    <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-300 cursor-not-allowed">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Previous
                    </span>
                @else
                    <button wire:click="previousPage" rel="prev"
                        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Previous
                    </button>
                @endif

                {{-- Page Numbers --}}
                @for ($page = 1; $page <= $bookmarks->lastPage(); $page++)
                    @if ($page == $bookmarks->currentPage())
                        <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium border border-gray-300 rounded-md bg-white text-black font-semibold">
                            {{ $page }}
                        </span>
                    @else
                        <button wire:click="gotoPage({{ $page }})"
                            class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-md">
                            {{ $page }}
                        </button>
                    @endif
                @endfor

                {{-- Next --}}
                @if ($bookmarks->hasMorePages())
                    <button wire:click="nextPage" rel="next"
                        class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                        Next
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                @else
                    <span class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-300 cursor-not-allowed">
                        Next
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                @endif
            </nav>
        </div>
    @endif
</div>