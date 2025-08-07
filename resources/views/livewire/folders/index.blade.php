<div>
    @if ($bookmarksVisible)
        <livewire:folders.bookmarks.index :folderId="$folderId"/>
    @else
        <div class="px-4 sm:px-6 lg:px-8 py-6">
            {{-- Create Folder Component --}}
            <livewire:folders.manage.create/>
            
            {{-- Read Folder Components --}}
            <livewire:folders.manage.read/>
        
            {{-- Update Folder Components --}}
            <livewire:folders.manage.update/>
        
            {{-- Delete Folder Components --}}
            <livewire:folders.manage.delete/>
        </div>
    @endif
</div>

