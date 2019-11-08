
@extends('cms.cms_master')
@section('main_content')
<h1>Add Category</h1>
<div class="container">
  <div class="row">
    <div class="col-8">
      <form action="{{ url('cms/categories') }}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title"><span class="text-danger">*</span>Title</label>
          <input value="{{ old('title') }}" type="text" name="title" id="title" class="form-control field-input-cms original-text">
          <small class="text-muted">The Title, min 2 chars max 255 chars</small><br>
          <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
        <div class="form-group">
          <label for="url"><span class="text-danger">* </span> Category Url</label>
        <input type="text" value="{{ old('url') }}" name="url" id="url" class="form-control field-input-cms target-text">
        <small class="text-muted">The category url, only small letters, -, numbers</small><br>
        <span class="text-danger">{{ $errors->first('url') }}</span>
        </div>
        {{-- the id is article and not description for the wysiwyg --}}
        <div class="form-group">
            <label for="article"><span class="text-danger">*</span> Description</label>
            
                <textarea name="description" id="article" class="form-control">
                    {{ old('description') }}
                </textarea>
            
            <small class="text-muted">The Description must contain at least two characters</small><br>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" name="image" id="image" class="custom-group-file">
            <label for="image" class="custom-file-label">Choose Category Image</label>
          </div>
        </div>
        <div class="form-group">
          <small class="text-muted">The image must be: jpg/jpeg/png/gif with max size of 5mb</small><br>
          <span class="text-danger">{{ $errors->first('image') }}</span>
        </div>

        <a href="{{ url('cms/categories') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" name="submit" class="btn btn-primary" value="Save Category">
      </form>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>


@endsection