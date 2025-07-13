@extends('layouts.dashboard')

@section('main-content')
<div class="px-4 sm:px-6 lg:px-8 py-6">
    {{-- Create Bookmark Component --}}
    <livewire:bookmark.create />

    {{-- Read Bookmark Component --}}
    <livewire:bookmark.read/>

    {{-- Update Bookmark Component --}}
    <livewire:bookmark.update/>

    {{-- Delete BookmarkComponent --}}
    <livewire:bookmark.delete/>
</div>
@endsection