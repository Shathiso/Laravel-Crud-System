<!-- Styles -->
        <style>
      .new-prof{
      	 float: right;
      }
      h2{
        text-align: center;
        color: white !important;
        margin-top: 3px !important;
      }

      .is-complete{
        text-decoration: line-through;
      }

      .edit-proj, .del-btn{
      	float: right;
      }

      .profile-wrapper{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
      }

      p{
        flex-basis:100%;
        margin-bottom: 2px !important;
      }

      h4{
        color:white !important;
        margin-bottom: 0px !important;
      }
        </style>

@extends('layout')
@section('title', 'Profile')

@section('content')
    <div class="title">Profile</div>
    <h2>Hello {{ Auth::user()->name }}  
   @foreach($profile as $profiles)
  <span class="edit-btn-wrapper"><a href="/profile/{{ $profiles->id }}/edit" class="button is-primary is-small mr-2" title="edit profile"><span><i class="fas fa-edit"></i></span></a></span>
@endforeach

@include('notification')

<!--- Check if the user already has a profile, then they can only edit their existing profile --->
@if(count($profile) == 0)
  <span class="edit-btn-wrapper"><a href="/profile/create" class="button is-success is-small" title="create a profile"><span><i class="fas fa-plus"></i></span></a></span>
@else
@endif
 </h2>

   <div class="profile-wrapper">
 @foreach($profile as $profiles) 
      <img src="/storage/{{ $profiles->profile_image_url }}" alt="" class="rounded-circle mt-3 mb-3" style="width: 200px; height: 200px; border: 6px solid #fff;"/>
     
     <p><h4 class="mr-2">Motto:</h4> {{ $profiles->motto }}</p>
     <p><h4 class="mr-2">Address:</h4> {{ $profiles->address }}</p>
     <p><h4 class="mr-2">City:</h4> {{ $profiles->city }}</p>
     <p><h4 class="mr-2">Country:</h4> {{ $profiles->country }}</p>
@endforeach

  </div>
@endsection