@extends('layouts.dashboard')

@section('main-content')
<div class="px-4 sm:px-6 lg:px-8 py-6">
    
    {{-- Read Components --}}
    <livewire:bookmark.read/>

    {{-- Update Components --}}
    <livewire:bookmark.update/>

    {{-- Delete Components --}}
    <livewire:bookmark.delete/>
</div>
@endsection