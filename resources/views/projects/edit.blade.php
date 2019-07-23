@extends('layout')
@section('title', 'Edit Project')

<style>
	.del-btn{
	float: right;
    position: relative;
    top: -72px;
	}
	
</style>

@section('content')


 
 <div class="title">Edit Project</div>
 <form method="POST" action="/projects/{{ $project->id }}" >
       @csrf
    @method('PATCH')

 	<div class="control has-icons-left ">
  <input type="text" name="title" class="input is-medium" placeholder="Title" value="{{ $project->title }}" required="true"> <span class="icon is-medium is-left">
    <i class="fas fa-pen"></i>
  </span></input>
</div><br/>

 <div class="control has-icons-left ">
  <input type="textarea" name="description" class="textarea is-medium" placeholder="Description" value="{{ $project->description }}"> <span class="icon is-medium is-left" required="true">
    <i class="fas fa-pen"></i>
  </span></input>
</div><br/><br/>
  <input type="submit" class="button is-success is-large" value="Update"></input>

 </form>


 <form method="POST" action="/projects/{{ $project->id }}" >
          @csrf
    @method('DELETE')
  <input type="submit" class="button is-danger is-large del-btn" value="Delete"></input>
 </form>

@endsection