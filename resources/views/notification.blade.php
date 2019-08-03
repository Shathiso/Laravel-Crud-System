 @if( session('msg') )
    <div class="btn btn-{{ session('msgTag') }} has-icons-left col-md-12 mb-3">
      <div class="is-medium"> <span class="icon is-medium is-left" >
     <i class="fas fa-info-circle"></i>
     </span>{{ session('msg') }}</div>
    </div>
@endif