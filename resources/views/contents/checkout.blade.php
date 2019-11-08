@extends('master')
@section('content')
{{ Breadcrumbs::render('checkout') }}
<div class="row">
  <div class="col">
    <h1>Checkout</h1>
    <div class="row">
      <div class="col-10">
        @if($cart)
        <table class="table table bordered">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Sub Total</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($cart as $item)
            <tr>
            <td>{{ $item['name'] }}</td>
            <td>
            <a href="{{ url('shop/update-cart?pid=' . $item['id'] . '&op=minus') }}" class="update-cart-btn"><i class="fa fa-minus-circle"></i></a>
            <input size="1" type="text" class="text-center" value="{{ $item['quantity'] }}">
            <a href="{{ url('shop/update-cart?pid=' . $item['id'] . '&op=plus') }}" class="update-cart-btn"><i class="fa fa-plus-circle"></i></a>
            </td>
            <td>${{ $item['price'] }}</td>
            <td>{{ $item['price'] * $item['quantity'] }}</td>
            <td class="text-center">
            <a href="{{ url('shop/remove-item?pid=' . $item['id']) }}" class="text-danger"><i class="fa fa-trash"></i></a>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      <p><b>Total in cart: </b> ${{ Cart::getTotal() }}
      <span class="float-right"><a href="{{ url('shop/clear-cart') }}" class="btn btn-light">Clear Cart</a></span>
      </p>
    <p><a class="btn btn-primary" href="{{ url('shop/order-now') }}">Order now</a></p>
      @else
      <p><b>No items in cart</b></p>

      @endif
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection