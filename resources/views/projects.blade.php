<!-- Styles -->
        <style>
      .new-proj{
      	 float: right;
      }

      .edit-proj{
      	float: right;
      }
        </style>

@extends('layout')
@section('title', 'Projects')

@section('content')
 <a href="/projects/create" class="button is-success new-proj">New Project</a>
<div class="title"> Projects</div>
 @foreach($projects as $project)
     <ul><ol><h3><a href="/projects/{{ $project->id }}">{{ $project->title }} </a>
 <a href="/projects/{{ $project->id }}/edit" class="button is-primary edit-proj">Edit</a></h3>
     {{ $project->description }}</ol></ul>
  @endforeach

@endsection