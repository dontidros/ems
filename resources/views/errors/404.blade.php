@php
 $menu = App\Menu::all()->toArray();   
@endphp

@extends('master')

@section('content')

    <div class="row">
        <div class="col">
          <h1 class="text-center display-4">Page Not Found</h1>
        </div>
      </div>
      <div class="row">
        <div class="col text-center">
          <img src="{{ url('images/404.jpg') }}" alt="page 404 image">
        </div>
      </div>





@endsection