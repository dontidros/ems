

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

  <a style="font-family: 'Vollkorn SC', serif;" class="navbar-brand" href="{{ url('') }} ">
    EarlyMusicShop
  </a>

  <a href="{{ url('shop/checkout') }}" class="mr-3 a-no-dec"><i class="fa fa-shopping-cart text-white"></i></a>
  @if( !Cart::isEmpty() )
  <div class="shop-total text-white">{{ Cart::getTotalQuantity() }}</div>
  @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('about') }}">About</a>
        </li> --}}
        @if (!empty($menu))
            @foreach($menu as $item)
            <li class="nav-item">
            <a href="{{ url($item['url']) }}" class="nav-link">{{ $item['link'] }}</a>
            </li>
            @endforeach
        @endif
        <li class="nav-item">
        <a class="nav-link" href="{{ url('shop') }}">Shop</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        @if (Session::has('user_id'))
            <li class="nav-item">
              {{-- user/profile is an extra mission that I decided not to do --}}
            <a class="nav-link">{{ Session::get('user_name') }}</a>
            </li>
            @if (Session::has('is_admin'))
                <li class="nav-item">
                  <a href="{{url('cms/dashboard')}}" class="nav-link">Admin Panel</a>
                </li>
            @endif
            <li class="nav-item">
            <a href="{{ url('user/logout') }}" class="nav-link">Logout</a>
            </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ url('user/signin') }}">Signin</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="{{ url('user/signup') }}">Signup</a>
          </li>              
        @endif

      </ul>
    </div>
    

  </nav>


