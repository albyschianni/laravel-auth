@extends('layouts.main-layout')
@section('content')

    <h1>Projects</h1>

    <div>Name: {{ $project -> name}} </div>
    <div>Description: {{ $project -> description}}</div>
    <div>Repo-Link: {{ $project -> repo_link}}</div>
@endsection