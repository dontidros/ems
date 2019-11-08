@extends('cms.cms_master')
@section('main_content')
<h1>Edit Content</h1>
<div class="container">
  <div class="row">
    <div class="col-8">
    <form action="{{ url('cms/content/' . $content_item['id']) }}" method="POST" novalidate="novalidate" autocomplete="off">
      @method('PUT')
      @csrf  
        <div class="form-group">
          <label for="menu-id"><span class="text-danger">*</span>Menu Link</label>
          <select name="menu_id" id="menu-id" class="form-control">
            <option value="">Choose menu link...</option>
            @foreach ($menu as $item)
          <option @if( $content_item['menu_id'] == $item['id']) selected="selected" @endif value="{{ $item['id'] }}">{{ $item['link'] }}</option>    
            @endforeach
          </select>
        <span class="text-danger">{{ $errors->first('menu_id') }}</span>
        </div> 
        <div class="form-group">
          <label for="title"><span class="text-danger">*</span>Title</label>
          <input value="{{ $content_item['ctitle'] }}" type="text" name="ctitle" id="ctitle" class="form-control field-input-cms">
          <small class="text-muted">The Title, min 2 chars max 255 chars</small><br>
          <span class="text-danger">{{ $errors->first('ctitle') }}</span>
        </div>

        <div class="form-group">
            <label for="article"><span class="text-danger">*</span> Article</label>
            
                <textarea name="article" id="article" class="form-control">
                    {{ $content_item['article'] }}
                </textarea>
            
            <small class="text-muted">The Article must contain at least two characters</small><br>
            <span class="text-danger">{{ $errors->first('article') }}</span>
        </div>
        <a href="{{ url('cms/content') }}" class="btn btn-secondary">Cancel</a>
        <input type="submit" name="submit" class="btn btn-primary" value="Update Content">
      </form>
    </div>
  </div>
</div>



@endsection