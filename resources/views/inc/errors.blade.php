@if($errors->any())
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $key => $error)
        <li>{{ $key }} {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endif