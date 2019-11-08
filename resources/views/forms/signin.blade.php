@extends('master')
@section('content')
<div class="container">
    {{ Breadcrumbs::render('signin') }}
    <div class="row">
      <div class="col">
        <h1 class="h2">Signin</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <form action="#" method="POST" novalidate="novalidate" autocomplete="off">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control">
            <span class="text-danger">{{ $errors->first('email') }}</span>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <span class="text-danger">{{ $errors->first('password') }}</span>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign In">
        </form>
      </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection