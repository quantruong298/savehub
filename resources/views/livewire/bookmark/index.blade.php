<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($bookmarks as $bookmark)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
            <div class="p-6">
                <!-- Bookmark Header -->
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center space-x-3 flex-1 min-w-0">
                        <img src="https://react.dev/favicon.ico" alt="Favicon" class="h-6 w-6 rounded-sm flex-shrink-0"
                            onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEwIDEzQTUgNSAwIDAgMCAxMCAzQTUgNSAwIDAgMCAxMCAxM1pNMTMuNSAzQTUgNSAwIDAgMCAxMy41IDEzSDEwVjNIMTMuNVoiIGZpbGw9IiNFNUU3RUIiLz4KPC9zdmc+';" />
                        <h3 class="text-lg font-semibold text-gray-900 truncate">
                            {{ $bookmark->title }}
                        </h3>
                    </div>
                    <svg class="h-5 w-5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M18 13V19H6V13M12 3V15" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>

                <!-- URL -->
                <p class="text-sm text-blue-600 mb-2 truncate">
                    {{ $bookmark->url }}
                </p>

                <!-- Description -->
                <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                    {{ $bookmark->description }}
                </p>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-4">
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        React
                    </span>
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Documentation
                    </span>
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Frontend
                    </span>
                </div>

                <!-- Date -->
                <p class="text-xs text-gray-500">Saved on {{ $bookmark->created_at }}</p>
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
            <a href="{{ $bookmarks->previousPageUrl() }}" rel="prev"
                class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Previous
            </a>
            @endif
    
            {{-- Page Numbers --}}
            @for ($page = 1; $page <= $bookmarks->lastPage(); $page++)
                @if ($page == $bookmarks->currentPage())
                <span
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium border border-gray-300 rounded-md bg-white text-black font-semibold">
                    {{ $page }}
                </span>
                @else
                <a href="{{ $bookmarks->url($page) }}"
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-md">
                    {{ $page }}
                </a>
                @endif
                @endfor
    
                {{-- Next --}}
                @if ($bookmarks->hasMorePages())
                <a href="{{ $bookmarks->nextPageUrl() }}" rel="next"
                    class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-gray-500 hover:text-gray-900">
                    Next
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
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
</div>

{{-- resources/views/bookmarks/index.blade.php
<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Bookmarks</h1>
        <livewire:bookmark.add />
        @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
            class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-300 flex items-center justify-between transition-opacity duration-300"
            style="min-width:200px;">
            <span>{{ session('success') }}</span>
            <button type="button" @click="show = false"
                class="ml-4 text-green-700 hover:text-green-900 font-bold">&times;</button>
        </div>
        @endif
    </div>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Title</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">URL</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Created At</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($bookmarks as $bookmark)
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $bookmark->id }}</td>
                    <td class="px-4 py-2 text-sm text-gray-900 font-semibold">{{ $bookmark->title }}</td>
                    <td class="px-4 py-2 text-sm text-blue-600">
                        <a href="{{ $bookmark->url }}" target="_blank" class="hover:underline">{{ $bookmark->url }}</a>
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $bookmark->description }}</td>
                    <td class="px-4 py-2 text-sm text-gray-500">{{ $bookmark->created_at }}</td>
                    <td class="px-4 py-2 text-sm">
                        <livewire:bookmark.edit :bookmark="$bookmark" :key="$bookmark->id" />
                        <livewire:bookmark.delete :bookmark="$bookmark" :key="$bookmark->id" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $bookmarks->links() }}
        </div>
    </div>
</div> --}}