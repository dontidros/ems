@extends('master')
@section('content')
{{ Breadcrumbs::render('item', $curl, $purl) }}

<div class="container-fluid">
  <div class="row">
    <div class="col-2">
        <ul class="nav flex-column">
            @foreach($categories as $category)
            <li class="nav-item">
            @if ($category['id'] == $product['categorie_id'])
            <a style="color:blue !important;font-weight:500 !important;" href="{{ url('shop/' . $category['url']) }}" class="nav-link">{{ $category['title'] }}</a>    
            @else
            <a href="{{ url('shop/' . $category['url']) }}" class="nav-link">{{ $category['title'] }}</a>    
            @endif
            </li>
            @endforeach
          </ul>
    </div>
    <div class="col-10">
        <div class="row">
            <div class="col-10">
            <h1>{{ $product['ptitle'] }}</h1>
            <p><img src="{{ asset('images/' . $product['pimage']) }}" alt="{{ $product['ptitle'] }}" style="width:100%;"></p>
            <p>{!! $product['article']  !!}</p>
            <p><b>Price on site: {{ $product['price'] }}</b></p>
            <p>
            @if(!Cart::get($product['id']))
            <button data-id="{{ $product['id'] }}" class="btn btn-outline-success ml-3 add-to-cart-btn"><i class="fa fa-cart-plus mr-2"></i>Add To Cart</button>
            @else
            <button data-id="{{ $product['id'] }}" class="btn btn-outline-success ml-3 add-to-cart-btn" disabled="disabled"><i class="fa fa-cart-plus mr-2"></i>Already in cart</button>
            @endif
            <a class="btn btn-outline-primary" href="{{ url('shop/checkout') }}">Continue to checkout</a>
            </p>
            </div>
          </div>
    </div>
  </div>
</div>

@endsection
