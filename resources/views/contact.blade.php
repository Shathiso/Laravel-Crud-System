@extends('layout')
@section('title', 'Contact')

@section('content')
 
 <div class="title">Contact</div>
 <div class="contacts">
 
  @foreach($contacts as $contact)
     <li>{{ $contact }}</li>
  @endforeach
 </div>
@endsection

