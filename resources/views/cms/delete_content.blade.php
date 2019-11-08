@extends('cms.cms_master')
@section('main_content')
<h3>Are you sure that you want to delete this menu item?</h3>
<div class="row">
  <div class="col">
  <form action="{{ url('cms/content/'. $item_id) }}" method="POST">
      @method('DELETE')
      @csrf
    <a href="{{ url('cms/content') }}" class="btn btn-secondary">Cancel</a>
    <input type="submit" value="Delete" name="submit" class="btn btn-danger">
    </form>
  </div>
</div>

@endsection