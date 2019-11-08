@extends('master')
@section('content')
@if(!empty($products))
{{ Breadcrumbs::render('products', $curl) }}
<div class="container-fluid">
    <div class="row">
    <div class="col-2">
        <ul class="nav flex-column">
          @foreach($categories as $category)
          <li class="nav-item">
          @if ($category['id'] == $products[0]->categorie_id)
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
            <div class="col">
              <h1>{{ $title }}</h1>
            </div>
          </div>
          <div class="row">
          
          
          
            <div class="col-10">
              <p>{{ $products->links() }} Total {{ $total_count }} products found</p>
            </div>
          </div>
          <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
            <img src="{{ asset('images/' . $product->pimage) }}" alt="{{ $product->ptitle }}" style="width:100%">
            <h3>{{ $product->ptitle }}</h3>
            <p>Price on site: <b> ${{ $product->price }} </b></p>
            <div>
            <a class="btn btn-outline-primary" href="{{ url('shop/' . $product->url . '/' . $product->purl) }}">View</a>
            @if(!Cart::get($product->id))
            <button data-id="{{ $product->id }}" class="btn btn-outline-success add-to-cart-btn ml-3"><i class="fa fa-cart-plus mr-2 "></i>Add To Cart</button>
            @else
            <button type="button" data-id="{{ $product->id }}" class="btn btn-outline-success add-to-cart-btn ml-3" disabled="disabled"><i class="fa fa-cart-plus mr-2 "></i>Already in cart</button>
            @endif
          
            </div>
            </div>
            @endforeach
          </div>
          @endif
    </div>
  </div>
</div>




@endsection

