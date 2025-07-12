@extends('layouts.dashboard')

@section('main-content')
<div class="px-4 sm:px-6 lg:px-8 py-6">
    
    {{-- Read Components --}}
    <livewire:folder.read/>

    {{-- Update Components --}}
    <livewire:folder.update/>

    {{-- Delete Components --}}
    <livewire:folder.delete/>
</div>
@endsection