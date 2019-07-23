@extends('layout')
@section('title', 'Create Project')

@section('content')


 
 <div class="title">Create Projects</div>
 <form method="POST" action="/projects" >

    {{ csrf_field() }}

 	<div class="control has-icons-left ">
  <input type="text" name="title" class="input {{ $errors->has('title') ? 'is-danger' : ''}} is-medium" placeholder="Title" value="{{ old('title') }}"> <span class="icon is-medium is-left">
    <i class="fas fa-pen"></i>
  </span></input>
</div><br/>

 <div class="control has-icons-left ">
  <input type="textarea" name="description" class="textarea  {{ $errors->has('title') ? 'is-danger' : ''}} is-medium" placeholder="Description" value="{{ old('description') }}"> <span class="icon is-medium is-left">
    <i class="fas fa-pen"></i>
  </span></input>
</div><br/><br/>
  <input type="submit" class="button is-success is-large"></input>
 
 @if($errors->any())
 <br/><br/>
  <div class="notification is-danger">
 @foreach($errors->all() as $error)
     {{ $error }}</ol></ul>
  @endforeach
</div>
@endif
@endsection
 </form>

