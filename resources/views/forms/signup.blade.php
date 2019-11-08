

@extends('master')
@section('content')
<div class="container">
    {{ Breadcrumbs::render('signup') }}
    <div class="row">
      <div class="col">
        <h1 class="h2">Signup</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <form action="#" method="POST" novalidate="novalidate" autocomplete="off">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control">
            <span class="text-danger">{{ $errors->first('name') }}</span>
          
          </div>
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
          <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" name="password_confirmation" id="confirm-password" class="form-control">
            
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="Sign Up">
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
@endsection