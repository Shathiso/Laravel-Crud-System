@extends('layout')
@section('title', 'Edit Profile')

<style>

.profile--edit--wrapper{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.control{
  flex-basis: 48%;
}

.image-form{
  display: block;
}
	.del-btn{
	float: right;
    position: relative;
    top: -72px;
	}
	
</style>

@section('content')
 <div class="title">Edit Profile</div>

  @include('notification')
 <form method="POST" action="/profile/{{ $profile->id }}" enctype="multipart/form-data">
       @csrf
    @method('PATCH')

<div class="profile--edit--wrapper">
 <div class="control has-icons-left ">
  <input type="text" name="motto" class="input mb-2" placeholder="Motto" value="{{ $profile->motto }}"> <span class="icon is-medium is-left" >
    <i class="fas fa-pen"></i>
  </span></input>
</div>

<div class="control has-icons-left ">
  <input type="text" name="address" class="input  mb-2" placeholder="Address" value="{{ $profile->address }}"> <span class="icon is-medium is-left" >
    <i class="fas fa-pen"></i>
  </span></input>
</div>



<div class="control has-icons-left ">
  <input type="text" name="city" class="input  mb-2" placeholder="City" value="{{ $profile->city }}"> <span class="icon is-medium is-left" >
    <i class="fas fa-pen"></i>
  </span></input>
</div>

<div class="control has-icons-left ">
  <input type="text" name="country" class="input  mb-2" placeholder="Country" value="{{ $profile->country }}"> <span class="icon is-medium is-left" >
    <i class="fas fa-pen"></i>
  </span></input>
</div>
</div>

 <!--- Image Upload --->

<div class=" has-icons-left ">
<p class="mt-2 mb-1">Upload profile image</p>
<input type="file" name="image" class="mb-2" ></input></br>
</div>
<!--- Update Button --->
<input type="submit" class="button is-success is-large mt-3" value="Update"></input>

 </form>

@endsection