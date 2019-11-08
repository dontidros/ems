@extends('cms.cms_master')
@section('main_content')
<h1>Edit Site Products</h1>
<p>
<a class="btn btn-primary" href="{{ url('cms/products/create') }}">Add Product</a>
</p>
<div class="table-responsive mt-5">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Product</th>
        <th>Product Image</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $item)
        <tr>
          <td>{{ $item['ptitle'] }}</td>
        <td><img width="50" src="{{ asset('images/' . $item['pimage']) }}" alt="{{ $item['ptitle'] }}"></td>
          <td>
          <a class="btn btn-sm btn-info" href="{{ url('cms/products/' . $item['id'] . '/edit') }}"><i class="fa fa-pencil mr-3"></i>Edit</a>
          <a class="btn btn-sm btn-danger mr-3" href="{{ url('cms/products/' . $item['id']) }}"><i class="fa fa-eraser mr-3"></i>Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection