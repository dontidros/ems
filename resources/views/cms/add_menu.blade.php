@extends('cms.cms_master')
@section('main_content')
<h1>Add Menu Link</h1>
<div class="container">
  <div class="row">
    <div class="col-8">
    <form action="{{ url('cms/menu') }}" method="POST" novalidate="novalidate" autocomplete="off">
      @csrf  
      <div class="form-group">
          <label for="link"><span class="text-danger">*</span>link</label>
      <input value="{{ old('link') }}" type="text" name="link" id="link" class="form-control field-input-cms original-text">
          <small class="text-muted">The menu link, min 2 chars max 50 chars</small><br>
          <span class="text-danger">{{ $errors->first('link') }}</span>
        </div>
        <div class="form-group">
          <label for="url"><span class="text-danger">*</span>URL Menu</label>
          <input value="{{ old('url') }}" type="text" name="url" id="url" class="form-control field-input-cms target-text">
          <small class="text-muted">The URL menu, only small letters, -, numbers</small><br>
          <span class="text-danger">{{ $errors->first('url') }}</span>
        </div>
        <div class="form-group">
          <label for="title"><span class="text-danger">*</span>Page Title</label>
          <input value="{{ old('title') }}" type="text" name="title" id="title" class="form-control field-input-cms">
          <small class="text-muted">The Page Title, min 2 chars max 100 chars</small><br>
          <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
        <a href="{{ url('cms/menu') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" name="submit" class="btn btn-primary" value="Save Menu">
      </form>
    </div>
  </div>
</div>

<!-- -->

@endsection