<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Your Bookmarks</h1>

    @if ($bookmarks->isEmpty())
        <p class="text-gray-500">You have no bookmarks yet.</p>
    @else
        <ul class="space-y-3">
            @foreach ($bookmarks as $bookmark)
                <li class="border rounded p-4 shadow">
                    <h2 class="text-lg font-semibold">
                        <a href="{{ $bookmark->url }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $bookmark->title }}
                        </a>
                    </h2>
                    @if ($bookmark->description)
                        <p class="text-sm text-gray-700">{{ $bookmark->description }}</p>
                    @endif
                    @if ($bookmark->tags)
                        <p class="text-xs text-gray-400">Tags: {{ $bookmark->tags }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
