@extends('cms.cms_master')
@section('main_content')
<h1>Edit Site Content</h1>
<p>
<a class="btn btn-primary" href="{{ url('cms/content/create') }}">Add Content</a>
</p>
<div class="table-responsive mt-5">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        
        <th>Title</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contents as $item)
        <tr>
          <td>{{ $item['ctitle'] }}</td>
          
          <td>
          <a class="btn btn-sm btn-info" href="{{ url('cms/content/' . $item['id'] . '/edit') }}"><i class="fa fa-pencil mr-3"></i>Edit</a>
          <a class="btn btn-sm btn-danger mr-3" href="{{ url('cms/content/' . $item['id']) }}"><i class="fa fa-eraser mr-3"></i>Delete</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection