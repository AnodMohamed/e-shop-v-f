
<style>
.wrapper-progressBar {
    width: 100%
}

.progressBar {
}

.progressBar li {
    list-style-type: none;
    float: left;
    width: 33%;
    position: relative;
    text-align: center;
}

.progressBar li:before {
    content: " ";
    line-height: 30px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: block;
    text-align: center;
    margin: 0 auto 10px;
    background-color: white
}

.progressBar li:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    background-color: #ddd;
    top: 15px;
    left: -50%;
    z-index: -1;
}

.progressBar li:first-child:after {
    content: none;
}

.progressBar li.active {
    color: #02b458;
}

.progressBar li.active:before {
    border-color: #02b458;
    background-color: #02b458;
}

.progressBar .active:after {
    background-color: #02b458;
}
.quantity{
  display: none;

}

</style>
<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Shopping Cart') }}
  </h2>
</x-slot>

@php
    $items =\Gloudemans\Shoppingcart\Facades\Cart::content('items');
    $subtotal=\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
    $tax=\Gloudemans\Shoppingcart\Facades\Cart::tax();
    $total=\Gloudemans\Shoppingcart\Facades\Cart::total();
    $count=\Gloudemans\Shoppingcart\Facades\Cart::count();

@endphp

<section class="h-100 h-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h6 class=" mb-0 text-black">Shopping Cart</h6>
                      <h6 class="mb-0 text-muted"> {{$count}}  items</h6>
                    </div>

                    @if (Session::has('message'))
                    <div class="row py-5">
                      <div class="text-success" role="alert" id="text-success">
                          <i class="fa-solid fa-circle-check"></i>  {{Session::get('message')}}
                      </div>
                    </div>
                     @endif

                     @if (Session::has('error'))
                     <div class="row py-5">
                       <div class="text-warning" role="alert" id="text-warning">
                          <i class="fas fa-exclamation-triangle"></i>  {{Session::get('error')}}
                       </div>
                     </div>
                     @endif

                    <div class="row">
                      <div class="col-xs-12 col-md-11  block border m-auto">
                        <div class="wrapper-progressBar">
                          <ul class="progressBar">
                            <li class="active">Order Information </li>
                            <li class="">Personal information </li>
                            <li class="">Done</li>
                          </ul>
                        </div>
                      </div>
                    </div>
              
                   
                    @if ($count == 0)

                        <div class="row py-5">
                          <div class="text-danger" role="alert" id="text-success">
                                The cart is empty
                          </div>
                        </div>
                    
                    @else
                    @foreach ( $items as  $item )
                    @php
                      $product = DB::table('products')->where('id',$item->id )->first();
                    @endphp
                      <hr class="my-4">
                      <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-3 col-lg-2 col-xl-2 ">
                          <img src="{{ asset('storage/products') }}/{{ $product->image }}" alt="{{ $product->name }}">
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 ">
                          <h6 class="text-black mb-0">  
                            <a  href="{{ route('product.view',['product_id'=>$item->id ]) }} "> {{$item->name}} </a>
                          </h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                          <form action="{{ route('cart.updatequantity') }}" method="POST">
                            @csrf
                            <input type="hidden" name='rowId' value="{{$item->rowId }}">
                            <input type="hidden" name='left_quantity' value="{{ $product->left_quantity }}">

                            <button  type="submit" class="btn btn-link px-2"
                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                            <i class="fas fa-minus"></i>
                            </button>
                          
                          <input min="1" name="quantity" value="{{ $item->qty}}" type="number"
                            class="form-control quantity form-control-sm" >
                            <span class="p-2"> {{ $item->qty}} </span>
    
                            <button  type="submit"  class="btn btn-link px-2"
                              onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                              <i class="fas fa-plus"></i>
                            </button>
                          </form>

                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 ">
                          <h6 class="mb-0">RS {{ $item->price}} </h6>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 ">
                          <h6 class="mb-0">RS {{ $item->subtotal}} </h6>
                        </div>


                        
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          <form action="{{ route('cart.delete') }}"  method="POST">
                            @csrf
                            <input type="hidden" name='rowId' value="{{$item->rowId }}">
                           
                            <button type="submit"
                                    class="text-muted">
                                    <i class="fas fa-times"></i>
                            </button>
                          </form>
                        </div>
                      </div>
                   @endforeach

                                       
                    <a href="{{ route('cart.empty') }}" class="btn btn-dark btn-flex btn-lg my-5">Empty the cart </a>
                 

                    @endif
       

                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items  {{$count}}  </h5>
                      <h5>SR {{$subtotal}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">tax</h5>
                      <h5>SR {{$tax}}</h5>
                    </div>
  
                    
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5> {{ $total }}</h5>
                    </div>
  
                    @if ($count != 0)
                      <a  href="{{ route('cart.personal') }}"  class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">Next</a>
                   @endif
                  
  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 