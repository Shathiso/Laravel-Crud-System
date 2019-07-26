@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-right ">
        <div class="col-md-3">
             <div class="card">
                <div class="card-header">Admin Links</div>
                <div class="card-body">
                <div class="links">
                  <a href="/projects">Projects</a>
                </div>
                </div>
             </div>
          </div>
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    
         
      </div>
</div>
@endsection
