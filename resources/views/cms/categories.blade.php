@extends('cms.cms_master')
@section('main_content')
<h1>Edit Site Categories</h1>
<p>
<a class="btn btn-primary" href="{{ url('cms/categories/create') }}">Add Category</a>
</p>
<div class="table-responsive mt-5">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Category</th>
        <th>Category Image</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $item)
        <tr>
          <td>{{ $item['title'] }}</td>
        <td><img width="50" src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['title'] }}"></td>
          <td>
          <a class="btn btn-sm btn-info" href="{{ url('cms/categories/' . $item['id'] . '/edit') }}"><i class="fa fa-pencil mr-3"></i>Edit</a>
          <a class="btn btn-sm btn-danger mr-3" href="{{ url('cms/categories/' . $item['id']) }}"><i class="fa fa-eraser mr-3"></i>Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection