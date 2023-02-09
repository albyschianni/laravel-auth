@extends('layouts.main-layout')

@section('content')
    <h1>Projects:</h1>

    @if (auth()->check())
    <a href="{{ route('project.create')}}">CREATE NEW PROJECT</a>
    @endif
    
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('project.show', $project)}}">
                    {{ $project -> name}}
                </a>

                @if (auth()->check())
                -- 
                <a href="{{ route('project.edit', $project)}}">EDIT</a>
                --
                <a href="{{ route('project.delete', $project)}}">X</a>
                @endif
                
                
            </li>
        @endforeach
    </ul>
@endsection
