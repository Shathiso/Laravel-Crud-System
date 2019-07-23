<!-- Styles -->
        <style>
      .new-proj{
      	 float: right;
      }
      h2{
        text-align: center;
      }

      .edit-proj, .del-btn{
      	float: right;
      }
        </style>

@extends('layout')
@section('title', 'Project')

@section('content')

    <h2>{{ $project->title }} 
 <a href="/projects/{{ $project->id }}/edit" class="button is-primary edit-proj">Edit</a></h2>
     <p>{{ $project->description }}</p>

@endsection