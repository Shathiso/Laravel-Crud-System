<!-- Styles -->
        <style>
      .new-prof{
      	 float: right;
      }
      h2{
        text-align: center;
      }

      .is-complete{
        text-decoration: line-through;
      }

      .del-btn{
      	float: right;
      }
        </style>

@extends('layout')
@section('title', 'Profile')

@section('content')
    <div class="profile-wrapper">
    <div class="title">Profile</div>
    @include('notification')
    <h2>Hello  {{ Auth::user()->name }} <a href="/profile/{{ $profiles->id }}/edit" class="button is-primary edit-prof">Edit Profile</a>
</h2>
    
   @foreach($profile as $pro) 
     <ul><ol><a href="/profile/{{ $pro->id }}">Profile </a></ol></ul>
  @endforeach
     </div>
@endsection