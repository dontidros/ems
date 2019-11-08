@extends('cms.cms_master')
@section('main_content')
<h3>Are you sure that you want to delete this product?</h3>
<div class="row">
  <div class="col">
  <form action="{{ url('cms/products/'. $item_id) }}" method="POST">
      @method('DELETE')
      @csrf
    <a href="{{ url('cms/products') }}" class="btn btn-secondary">Cancel</a>
    <input type="submit" value="Delete" name="submit" class="btn btn-danger">
    </form>
  </div>
</div>

@endsection