<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<title>EarlyMusicShop | Admin Panel </title>
<script>var baseUrl = "{{ url('') }}" + '/' ;</script>
</head>


<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a  class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('cms/dashboard') }}"><span style="font-family: 'Vollkorn SC', serif;">EarlyMusicShop</span> Admin Panel</a>

  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ url('user/logout') }}">Logout</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
          <a href="{{ url('') }}" target="_blank" class="nav-link">Back to site</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('cms/dashboard') }}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cms/menu') }}" class="nav-link">Menu</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cms/content') }}" class="nav-link">Content</a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('cms/categories') }}" class="nav-link">Categories</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cms/products') }}" class="nav-link">Products</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('cms/orders') }}" class="nav-link">Orders</a>
          </li>

        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      @yield('main_content')
    </main>
    @if(Session::has('sm'))
    <div class="container-fluid mt-2" id="sm-box">
      <div class="col">
        <div class="alert alert-success text-center" role="alert" >
          {{ Session::get('sm') }} 
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
      </script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
      <script src="{{ asset('js/script.js')}}"></script>
      <script>
        $('#article').summernote({
        placeholder: 'Write your article here',
        height: 100
      });
      </script>

<body>



  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>		
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="{{ asset('js/script.js')}}"></script>
</body> --}}

</html>