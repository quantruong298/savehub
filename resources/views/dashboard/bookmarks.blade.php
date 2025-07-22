@extends('layouts.dashboard')

@section('main-content')
<div class="px-4 sm:px-6 lg:px-8 py-6">
    {{-- Create Bookmark Component --}}
    <livewire:bookmarks.create />

    {{-- Read Bookmark Component --}}
    <livewire:bookmarks.read/>

    {{-- Update Bookmark Component --}}
    <livewire:bookmarks.update/>

    {{-- Delete BookmarkComponent --}}
    <livewire:bookmarks.delete/>
</div>
@endsection