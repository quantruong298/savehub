<!-- Main Content -->
<div class="flex-1 flex flex-col overflow-hidden">
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">All Bookmarks</h1>
            <div class="flex items-center space-x-2">
                <img class="h-8 w-8 rounded-full object-cover"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="User" />
                <span class="text-sm font-medium text-gray-700">John Doe</span>
            </div>
        </div>
    </header>

    <main class="flex-1 overflow-y-auto px-4 sm:px-6 lg:px-8 py-6">
        <!-- Search Bar -->
        <div class="relative max-w-md mb-6">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                🔍
            </div>
            <input type="text" placeholder="Search bookmarks..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent outline-none" />
        </div>

        <!-- Bookmarks Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($bookmarks as $bookmark)
            <div
                class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center space-x-3 flex-1 min-w-0">
                            <img src="{{ $bookmark['favicon'] }}" onerror="this.src='default-favicon.png'"
                                class="h-6 w-6 rounded-sm flex-shrink-0" alt="Favicon" />
                            <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $bookmark['title'] }}
                            </h3>
                        </div>
                        <a href="{{ $bookmark['url'] }}" target="_blank">🔗</a>
                    </div>
                    <p class="text-sm text-blue-600 mb-2 truncate">{{ $bookmark['url'] }}</p>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $bookmark['description'] }}</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach ($bookmark['tags'] as $tag)
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{
                            $tag }}</span>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500">Saved on {{ $bookmark['createdAt'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination Placeholder -->
        <div class="mt-8 flex justify-center">
            {{ $bookmarks->links() }}
        </div>
    </main>
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