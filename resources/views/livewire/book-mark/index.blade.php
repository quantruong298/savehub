{{-- resources/views/bookmarks/index.blade.php --}}
<div class="p-6">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Bookmarks</h1>
        <livewire:book-mark.add />
        @if (session('success'))
            <div 
                x-data="{ show: true }" 
                x-init="setTimeout(() => show = false, 2000)" 
                x-show="show"
                class="mb-4 px-4 py-3 rounded bg-green-100 text-green-800 border border-green-300 flex items-center justify-between transition-opacity duration-300"
                style="min-width:200px;"
            >
                <span>{{ session('success') }}</span>
                <button type="button" @click="show = false" class="ml-4 text-green-700 hover:text-green-900 font-bold">&times;</button>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $bookmarks->links() }}
        </div>
    </div>
</div>
