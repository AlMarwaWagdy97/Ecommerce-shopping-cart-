
<nav class="navbar fixed-top  navbar-expand-md navbar-dark bg-dark shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{asset('images/Blue_Deve-01.png')}}" alt="logo" style="width:40px;">
          </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Blue Development</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact.create')}}"> Contact US</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('shoping')}}"> Shopping </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<br>
@if (Session::get('appear')== 1 )
    <div>
        <a style="position:fixed;top:50px;right:5px;margin:20px;padding:5px 3px;" href="{{ route('Cart_shopping') }}">
            <img src="{{asset('images/shopping-cart.png')}}" alt="cart" style="width:40px;">
            <span class="badge">{{Session::has('cart') ? Session::get('cart')->TotalQuant: ''}}</span>    
        </a>
    </div> 
@endif

