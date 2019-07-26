 @if($errors->any())
 <br/><br/>
  <div class="notification is-danger">
 @foreach($errors->all() as $error)
     {{ $error }}</ol></ul>
  @endforeach
</div>
@endif