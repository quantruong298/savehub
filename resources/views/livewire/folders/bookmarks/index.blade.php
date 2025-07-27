<div>
    <livewire:folders.bookmarks.components.subtitle :folderId="$folderId"/>
    <div class="px-4 sm:px-6 lg:px-8 py-6">
        {{-- Folder/Bookmarks Read Component --}}
        <livewire:folders.bookmarks.components.read :folderId="$folderId"/>
        
        {{-- Folder/Bookmarks Add Component --}}
        <livewire:folders.bookmarks.components.add :folderId="$folderId"/>

        {{-- Folder/Bookmarks Remove Component --}}
        <livewire:folders.bookmarks.components.remove :folderId="$folderId"/>
    </div>
</div>