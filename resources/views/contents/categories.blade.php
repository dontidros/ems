@extends('master')
@section('content')
<div class="container">
    {{ Breadcrumbs::render('shop') }}

    <div class="row">
      <div class="col">
        <h1>Categories</h1>
        </div>
    </div>
    <div class="row">
      @if(!empty($categories))
      @foreach($categories as $categorie)
      <div class="col-md-4">
      <h2>{{ $categorie['title']}}</h2>
      <p><img width="100%" src="{{ asset('images/' . $categorie['image'])}}" alt=""></p>
      <p>{!! $categorie['description'] !!}</p>
      <p><a href="{{ url('shop/' . $categorie['url']) }}" class="btn btn-primary">View Products</a></p>
      </div>
      @endforeach
      @else
      <h4>No categories available</h4>
      @endif
    </div>
</div>
@endsection