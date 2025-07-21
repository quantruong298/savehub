<div>
    @if ($folder)
        <livewire:folder.bookmarks.read/>
    @else
    <div class="px-4 sm:px-6 lg:px-8 py-6">
        {{-- Create Folder Component --}}
        <livewire:folder.manage.create/>
        
        {{-- Read Folder Components --}}
        <livewire:folder.manage.read/>
    
        {{-- Update Folder Components --}}
        <livewire:folder.manage.update/>
    
        {{-- Delete Folder Components --}}
        <livewire:folder.manage.delete/>
    </div>
    @endif
</div>

