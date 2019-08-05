@extends('layouts.app')

<style>

main{
    padding-top: 0px !important;
}
.card-body{
    min-height: 400px;
}

.card{
    border: none !important;
}
 .group-item-wrapper{
    text-decoration: none;
    background-color: #343a40;
    margin-top: 0px;
    border-radius: 2px;
}

.list-group{
    text-align:center !important;
}

.list-group-item{
    text-decoration: none;
    background-color: #343a40 !important;
}

.card-header{
    border: none !important;
}

</style>

@section('content')
<div class="container">
    <div class="row justify-content-right ">
        <div class="col-md-3">
             <div class="card">
               
                <div class="card-body group-item-wrapper">

                <div class="list-group">
                <a class="list-group-item pt-2 pr-3 nice-back-icon" href="/">&nbsp;&nbsp;<i class="fa fa-home fa-fw nice-back-icon" aria-hidden="true"></i>&nbsp;&nbsp; </a>
                <a class="list-group-item pt-2 pr-3 nice-back-icon" href="/projects">&nbsp;&nbsp;<i class="fa fa-book fa-fw nice-back-icon" aria-hidden="true"></i>&nbsp;&nbsp;</a>
                <a class="list-group-item pt-2 pr-3 nice-back-icon" href="/profile">&nbsp;&nbsp;<i class="fa fa-user fa-fw nice-back-icon" aria-hidden="true"></i>&nbsp;&nbsp; </a>
                <a class="list-group-item pt-2 pr-3 nice-back-icon" href="#">&nbsp;&nbsp;<i class="fa fa-cog fa-fw nice-back-icon" aria-hidden="true"></i>&nbsp;&nbsp;</a>
                </div>
                </div>
             </div>
          </div>
        <div class="col-md-8 ">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                   <!--- count( $project->where('owner_id','=',Auth::user()->id)->get()) -->
                    @inject('project', 'App\Project')
                     @inject('user', 'App\User') 
                     <h3 class="center">Dashboard</h3>
                    <div class="control has-icons-left">
                    <span class="icon is-medium is-left" >
                    <i class="fas fa-tasks is-large nice-back-icon"></i>
                    <!-- count( $project->where('owner_id','=',Auth::user()->id)->get() ) -->
                    </span>
                    You currently have {{ count( $project->where('owner_id','=',Auth::user()->id)->get()) }} Projects
                    </div>
                </div>
            </div>
        </div>
    
         
      </div>
</div>
@endsection
