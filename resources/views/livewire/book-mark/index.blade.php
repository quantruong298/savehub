{{-- resources/views/bookmarks/index.blade.php --}}
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Bookmarks</h1>
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
