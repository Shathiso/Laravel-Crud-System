<!-- Styles -->
        <style>
      .new-proj{
      	 float: right;
      }
      h2{
        text-align: center;
      }

      .is-complete{
        text-decoration: line-through;
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

@include('notification')

@if($project->tasks->count())
     <h3>Tasks</h3> 
     @foreach($project->tasks as $task) 
     <div>
     <form method="POST" action="/tasks/{{ $task->id }}">
     @method('DELETE')
     @csrf
      <label class="checkbox {{ $task->completed ? 'is-complete' : ''}}" for="completed">
        <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
        {{ $task->description }}
      </label>
     </form>
     </div>  
     @endforeach
@endif
<div class="box">
<h3>Create A new Project Task</h3>
<form method="POST" action="/projects/{{ $project->id }}/tasks">
 @csrf
 <div class="control ">
 <label>Description</label>
  <input type="text" name="description" class="input {{ $errors->has('title') ? 'is-danger' : ''}} is-medium" placeholder="New Task.." value="{{ old('description') }}"> </input>
</div><br/>
 <input type="submit" class="button is-success is-medium" value="New Task"></input>
 @include('errors')
</form>
</div>
@endsection