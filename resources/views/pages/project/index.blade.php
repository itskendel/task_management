@extends('layouts.app')

@section('page_title')
    Projects
@endsection

@section('page_desc')
    Manage and organize your projects, track progress, and keep your team on schedule.
@endsection

@section('page_navigation')
    <x-flowbite.buttons variant="primary" href="{{ route('projects.create') }}">New Project</x-flowbite.buttons>
@endsection

@section('content')
    @livewire('pages.index_project')
@endsection
