@extends('layouts.main-layout')

@section('content')
    
    <h1>New Project</h1>
    <form method="POST" action="{{ route('project.update', $project) }}">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $project -> name}}">
        <br>
        <label for="description">Description</label>
        <input type="text" name="description" value="{{ $project -> description}}">
        <br>
        <label for="main_image">Main image</label>
        <input type="text" name="main_image" value="{{ $project -> main_image}}">
        <br>
        <label for="release_date">Release date</label>
        <input type="date" name="release_date" value="{{ $project -> release_date}}">
        <br>
        <label for="repo_link">Repo link</label>
        <input type="text" name="repo_link" value="{{ $project -> report_link}}">
        <br>
        <input type="submit" value="UPDATE TASK">
    </form>

@endsection