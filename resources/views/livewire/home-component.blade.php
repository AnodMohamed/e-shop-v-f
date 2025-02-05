 <style>
    .add_cart_btn {
      color: #fff;
      background: #02b458;
      border: 2px solid #02b458;
      padding: 10px 15px;
      border-radius:50px;
    }
    .add_cart_btn:hover {
      color: #02b458;
      background: none;
      padding: 10px 15px;
      border: 2px solid #02b458;
    
    }
    .in-cart{
      color: #fff;
      background: #02b458;
      padding: 10px 15px;
      border-radius:50px;
      border: 2px solid #02b458;
    }

    .about_card a{
      padding: 0px;
      border: none;
      color: #000;
      margin: 0 auto;
    }

    .about_card a:hover{
      background-color: #fff;
      color:#000;
    }
  </style>
 
 <!-- slider section -->
 <section class=" slider_section position-relative">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">1</li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1">2</li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2">3</li>

    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="col-md-3 offset-md-2">
            <div class="slider_detail">
              <h1>
                Store
                <span>
                  Aims
                </span>
              </h1>
              <p>
                Fresh, organic, and seasonal vegetables and fruit. 
              </p>
              <div>

              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="slider_img-box">
              <img src="{{ asset('images/slide-1.png')}}" alt="" style="width:400px; highet:400px">
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-3 offset-md-2">
            <div class="slider_detail">
              <h1>
                Web
                <span>
                  Aims
                </span>
              </h1>
              <p>
                turn the user experience from a traditional buying way to a digital experience
              </p>
              <div>

              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="slider_img-box">
              <img src="{{ asset('images/slide-2.png')}}" alt="" style="width:400px; highet:400px">
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-3 offset-md-2">
            <div class="slider_detail">
              <h1>
                Web
                <span>
                  Aims
                </span>
              </h1>
              <p>
                delivery service in less than 6 hours
              </p>
              <div>

              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="slider_img-box">
              <img src="{{ asset('images/slide-3.png')}}" alt="" style="width:400px; highet:400px">
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</section>

<!-- end slider section -->
</div>




<!-- why section -->
<section class="Why_section layout_padding">
<div class="container">
  <h2 
    id="down"
    data-mdb-toggle="animation"
    data-mdb-animation-reset="true"
  >About us</h2>
  <p>
    web application for an organic vegetables and fruits shop. It provides all the shop products online. The project covers the customers in Riyadh city. This helps customers to buy organic vegetables and fruits without moving from their space. 
</div>
</section>



<!-- end why section -->






<!-- Products section -->

<section class="about_section layout_padding">
  <div class="container">
    <h2>
     Products
    </h2>
  </div>

  <div class="container">
    @if (Session::has('message'))
    <div class="text-success" role="alert" id="text-success">
        <i class="fa-solid fa-circle-check"></i>  {{Session::get('message')}}
    </div>
     @endif
    <div class="about_card-container">
    </div>
      
      <div class="row">
     
        @foreach ($products as $product)

        <div class="about_card col-4 m-0" >
          
          <div class="about-detail">
            <div class="about_img-box" style="width: 250px; height:250px; margin: 15px auto;">
              <img src="{{ asset('storage/products') }}/{{$product->image}}" alt="" class="w-100 h-100">
            </div>
            <div class="card_detail-ox">
              <h4>
                <a class="product-title" href="{{ route('product.view',['product_id'=>$product->id ]) }} "> {{$product->name}} </a>
               
              </h4>
              <p style="color:#02b458 ">
                {!!$product->price!!}
                <b> SR</b>
              </p>
              <div>
                  

                  @if ($cart->where('id', $product->id)->count())
                        <span class="in-cart">In cart</span> 
                  @else
                    <form action="{{ route('cart.add') }}"  method="POST">
                      @csrf
                      <input type="hidden" name='product_id' value="{{ $product->id }}">
                      <input name="quantity" value="1" type="number"
                            class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                            style="width: 50px"/>
                            

                    
                        <button type="submit"
                                class="add_cart_btn">
                            Add to Cart
                        </button>
                    </form>
                  @endif

              </div>
            </div>
          </div>
       
        </div>
        @endforeach

        {!! $products->links() !!} 
      </div>


 
    
      
    </div>
  </div>
</section>

@push('scripts')

    <script>

    $("text-success").ready(function(){
      setTimeout(function(){
        $("div.text-success").remove();
      }, 5000 ); // 5 secs

    });

    </script>

@endpush






