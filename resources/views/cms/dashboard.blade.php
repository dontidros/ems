@extends('cms.cms_master')
@section('main_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>

  </div>

  {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

  <h3>Site Statistics</h3>
  <table class="table table-striped col-md-6">
    <tr>
      <th>Categories</th>
      <td>{{ $categories_amount[0]->c }}</td>
    </tr>
    <tr>
      <th>Products</th>
      <td>{{ $products_amount[0]->c }}</td>
    </tr>
    <tr>
      <th>Users</th>
      <td>{{ $users_amount[0]->c }}</td>
    </tr>
    <tr>
      <th>Orders</th>
      <td>{{ $orders_amount[0]->c }}</td>
    </tr>
    <tr>
      <th>Total income</th>
      <td>$ {{ $total_income[0]->sum }}</td>
    </tr>

  </table>
  
 
@endsection  