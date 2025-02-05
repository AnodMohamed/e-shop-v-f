<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>The E-shop vegetables and fruit organic </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />


  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

  @livewireStyles

</head>
<style>
  .logo{
    color: #fff;
  }
  .logo:hover{
    color: #fff;
  }
  .logo h3{
    margin-left: 10px;
  }

  /* mobile */
  @media (max-width: 575.98px) { 
    .logo h3{
      display: none;
    } 

  }
  

  .overlay-content
  a:hover, a:focus {
     color: #02b458;
  }
</style>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container" >
          <a class="navbar-brand logo" href="{{ route('home')}}">
            <h1>
              <i class="fa-solid fa-briefcase logo" ></i>
            </h1>
            <h3 >
              The E-shop vegetables and fruit organic   
            </h3>
          </a>

          <div class="navbar-collapse" id="">
            <div class="d-none d-lg-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav my-2 mb-3 mb-lg-0 mr-5  ">
                @if (Auth::check() == '1' )

                    @if (Auth::user()->utype ==='ADM' || Auth::user()->utype === 'DRV' )
                    
                    @elseif(Auth::user()->utype === 'Cust')
                      <li class="nav-item">
                        <a class="nav-link"  href="{{ route('cart.show')}}">
                          <i class="fa-solid fa-cart-shopping"></i>
                          <span>Cart({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count();}})</span></a>
                      </li>
                    @endif
                @else
                    <li class="nav-item">
                      <a class="nav-link"  href="{{ route('cart.show')}}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Cart({{ \Gloudemans\Shoppingcart\Facades\Cart::content()->count();}})</span></a>
                    </li>
                @endif



                @if(Auth::check())
                <li class="nav-item">
                  <p class="nav-link" >
                    <span>{{Auth::user()->name}}</span></p>
                </li>
                @else

              <li class="nav-item">
                <a class="nav-link"  href="{{ route('login')}}">
                  <img src="{{ asset('images/login.png') }}" alt="" />
                  <span>Login</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register')}}">
                  <img src="{{ asset('images/signup.png') }}" alt="" />
                  <span>Sign Up</span>
                </a>
              </li>

              @endif
              </ul>
             
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="{{ route('home') }}">HOME</a>

                @auth
                    @if ( Auth::user()->utype == 'ADM')
                      <a href="{{ route('admin.category') }}">Categories</a>
                      <a href="{{ route('admin.products') }}">Products</a>
                      <a href="{{ route('admin.drivers') }}">Drivers</a>
                      <a href="{{ route('admin.orders6') }}">Orders</a>

                    @elseif ( Auth::user()->utype == 'Cust')
                      <a href="{{ route('customer.orders') }}">Orders</a>

                    @elseif ( Auth::user()->utype == 'DRV')
                      <a href="{{ route('driver.orders') }}">Orders</a>

                    @endif         
 
                      @csrf
                    <a  href="{{ route('profile.show') }}">Profile</a>

                    
                @endauth
                <a  href="{{ route('products') }}">All Products</a>

                @auth
                  <a title="Logout" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> Logout</a>
                  <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf

                </form>
         
                @endauth

              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
   
    <!-- start main section -->

	{{ $slot }}

    <!-- end main section -->


  <!-- footer section -->
  <hr class="footer_hr">
  <section class="container-fluid footer_section">
    <p>
      &copy;
      2022 All Rights Reserved. Design by
      <span >The E-shop vegetables and fruit organic </span>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>



  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width")
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    }
  </script>

  @livewireScripts

  @stack('scripts') 
  

</body>

</html>

