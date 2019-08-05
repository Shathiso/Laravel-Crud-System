<!-- Styles -->
        <style>

         .content{ 
             padding: 24px;
            width: 75%;
            border-radius: 6px;
            color: white;
           }

      .new-proj{
      	 float: right;
      }

      .clearfix::after{
        display: block !important;
        content:'';
        clear: both !important;
        width: 100%;
      }

      .edit-proj{
      	float: right;
        margin-top: -7px;
      }

      .del-form{
        display:inline-block;
        float: right;
      }

      .del-btn{
        float: right;
        margin-top: -7px;
      }

      .card{
        flex-basis: 49% !important;
      }

      .card-wrapper{
        display:flex;
        flex-wrap: wrap;
        justify-content: space-between;
      }

      .edit-btn-wrapper{
        float:right !important;
      }

      ul.pagination{
       display: flex;
      justify-content: center;
      width: 100%;
      }
        </style>

@extends('layout')
@section('title', 'Projects')

@section('content')
<div class="clearfix">
 <a href="/projects/create" class="btn btn-primary new-proj">New Project</a>
 </div>
<div class="title clearfix"> Projects</div>

@include('notification')

<div class="card-wrapper">
 @foreach($projects as $project)
     
     <div class="card mb-3 p-3">
     <h4><a href="/projects/{{ $project->id }}">{{ $project->title }} </a>
     <!-- Edit button --->
     <span class="control has-icons-left edit-proj">
      <span class="edit-btn-wrapper"><a href="/projects/{{ $project->id }}/edit" class="button is-primary is-small" title="edit"><span><i class="fas fa-edit"></i></span></a></span>
    </span>
      <!-- End Edit button --->

      <!-- Delete button --->
      <form method="POST" action="/projects/{{ $project->id }}" class="del-form mr-1">
          @csrf
    @method('DELETE')
    <span class="control has-icons-left del-btn"><button type="submit" title="delete" class="button is-danger is-small ">
    <span><i class="fas fa-trash"></i></span>
    </button></span>
    </form>
    <!-- End Delete button --->
      
      
      </h4>
     
     {{ $project->description }}</div>
  @endforeach

  <div>
  
  </div class="col-md-12 pagination-wrapper">
  {{ $projects->links()}}
</div>
@endsection