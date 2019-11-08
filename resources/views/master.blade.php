<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Vollkorn+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<title>EarlyMusicShop |@if(!empty($title)) {{ $title }} @endif</title>
<script>var baseUrl = "{{ url('') }}" + '/' ;</script>
</head>

<body>

  <header>
    @include('inc.topnav')
  </header>
  <br>
  <br>
  <br>
  
  <div class="ui-widget" style="display:flex;justify-content:center; padding:10px;">
      <input id="title" placeholder="Search Product" autocomplete="off"><span><i style="position:relative;top:2px;right:18px;" class="fa fa-search"></i></span>
  </div>

  @if(Session::has('sm'))
  <div class="container-fluid mt-2" id="sm-box">
    <div class="col">
      <div class="alert alert-success" role="alert" >
        {{ Session::get('sm') }} 
      </div>
    </div>
  </div>
  @endif

  <main>
    
    {{-- @include('inc.errors') --}}

    <div class="container-fluid">
      @yield('content')
    </div>
  </main>


 
  <footer>
    @include('inc.footer')
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $('#title').on('keyup', function() {
      var title = $('#title').val();
      $.get( baseUrl + 'search', {
        "title": title
      }, function(result) {
        if (result) {
          titles = JSON.parse(result);
          titlesArray = new Array();
          for (var obj of titles) {
            titlesArray.push(obj['ptitle']);
          }
          $('#title').autocomplete({
            source: titlesArray,
            select: function(event, ui) {
              var selectedTitle = ui.item.label;
              window.location.href = baseUrl + "search-result?selectedTitle=" + selectedTitle;
            }
          })
        }
      })
    })
  </script>		
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  


  <script src="{{ asset('js/script.js')}}"></script>
</body>

</html>