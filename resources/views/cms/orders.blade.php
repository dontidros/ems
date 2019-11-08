@extends('cms.cms_master')
@section('main_content')
<h1>Site Orders</h1>

<div class="table-responsive mt-5">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>User</th>
        <th>Order Details</th>
        <th>Total</th>
        <th>Date And Time</th>
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td>
            <ul>
              @foreach(unserialize($item->data) as $order)
              <li>
              {{ $order['name'] }}, Quantity: {{ $order['quantity'] }}, Price: ${{ $order['price'] }}
              </li>
              @endforeach
            </ul>
          </td>
          <td>${{ $item->total }}</td>
          <td>{{ date('d/m/Y  H:i:s', strtotime($item->created_at)) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection