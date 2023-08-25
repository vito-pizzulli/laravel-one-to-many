@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('editSuccess'))
        <div class="alert alert-success">
            {{ session('editSuccess') }}
        </div>
    @endif

    <div class="card mb-3">

        @if (str_starts_with($project->image, 'http' ))
            <img src="{{ $project->image }}" alt="{{ $project->title }}">
        @else
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        @endif

        <div class="card-body">
            <h1 class="card-title fs-3">Title: {{ $project->title }} </h1>
            <p class="card-text">Type: {{ $project->type->name }} </p>
            <p class="card-text">Description: {{ $project->description }} </p>
            <p class="card-text">GitHub Page Link: {{ $project->link }} </p>
            <p class="card-text">Date Of Creation: {{ $project->creation_date }} </p>
        </div>
    </div>

    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
    <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project ) }}" method="POST" onsubmit="return confirm('Are you sure you want to move this project to the Recycle Bin?')">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-dark">Delete</button>
    </form>
    <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Return to List</a>
</div>
@endsection