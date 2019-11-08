
@extends('cms.cms_master')
@section('main_content')
<h1>Add Product</h1>
<div class="container">
  <div class="row">
    <div class="col-8">
      <form action="{{ url('cms/products') }}" method="POST" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="categorie-id"><span class="text-danger">*</span>Category</label>
          <select name="categorie_id" id="categorie-id" class="form-control">
            <option value="">Choose Category...</option>
            @foreach ($categories as $item)
          <option @if(old('categorie_id')==$item['id']) selected="selected" @endif value="{{ $item['id'] }}">{{ $item['title'] }}</option>    
            @endforeach
          </select>
        <span class="text-danger">{{ $errors->first('categorie_id') }}</span>
        </div> 
        <div class="form-group">
          <label for="title"><span class="text-danger">*</span>Title</label>
          <input value="{{ old('ptitle') }}" type="text" name="ptitle" id="title" class="form-control field-input-cms original-text">
          <small class="text-muted">The Title, min 2 chars max 255 chars</small><br>
          <span class="text-danger">{{ $errors->first('ptitle') }}</span>
        </div>
        <div class="form-group">
          <label for="url"><span class="text-danger">* </span> Product Url</label>
        <input type="text" value="{{ old('purl') }}" name="purl" id="url" class="form-control field-input-cms target-text">
        <small class="text-muted">The product url, only small letters, -, numbers</small><br>
        <span class="text-danger">{{ $errors->first('purl') }}</span>
        </div>
        <div class="form-group">
          <label for="price"><span class="text-danger">*</span> Product Price</label>
          <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
          <small class="text-muted">The product price, only numbers</small><br>
        <span class="text-danger">{{ $errors->first('price') }}</span>
        </div>
        {{-- the id is article (not description) for the wysiwyg --}}
        <div class="form-group">
            <label for="article"><span class="text-danger">*</span> Article</label>
            
                <textarea name="article" id="article" class="form-control">
                    {{ old('article') }}
                </textarea>
            
            <small class="text-muted">The Article must contain at least two characters</small><br>
            <span class="text-danger">{{ $errors->first('article') }}</span>
        </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
          </div>
          <div class="custom-file">
            <input type="file" name="pimage" id="image" class="custom-group-file">
            <label for="image" class="custom-file-label">Choose Product Image</label>
          </div>
        </div>
        <div class="form-group">
          <small class="text-muted">The image must be: jpg/jpeg/png/gif with max size of 5mb</small><br>
          <span class="text-danger">{{ $errors->first('pimage') }}</span>
        </div>

        <a href="{{ url('cms/products') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" name="submit" class="btn btn-primary" value="Save Product">
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