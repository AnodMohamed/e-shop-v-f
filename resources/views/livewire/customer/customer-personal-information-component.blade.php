@push('styles')
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

</style> 
@endpush


<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Shopping Cart') }}
    </h2>
</x-slot>

@php

    
    $items =\Gloudemans\Shoppingcart\Facades\Cart::content('items');
    $subtotal=\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
    $tax=\Gloudemans\Shoppingcart\Facades\Cart::tax();
    $subandtax=$subtotal + $tax ;
    $subandtaxship=$subtotal + $tax + 10;
    $total=\Gloudemans\Shoppingcart\Facades\Cart::total();
    $count=\Gloudemans\Shoppingcart\Facades\Cart::count();
@endphp

<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-12 col-md-11  block border m-auto">
                      <div class="wrapper-progressBar">
                        <ul class="progressBar">
                          <li class="active">Order Information </li>
                          <li class="active">Personal information </li>
                          <li class="">Done</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Personal information  </h3>
                    <hr class="my-4">
                    @if (Session::has('message'))
                        <div class="text-success" role="alert">
                            <i class="fa-solid fa-circle-check"></i>  {{Session::get('message')}}
                        </div>
                    @endif

                    
                    <form wire:submit.prevent="storeOrder"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">

                        <label class="form-label" for="form12">First name</label>
                        <input type="text" id="" class="form-control" wire:model="firstname"  placeholder="first name"/>

                        @error('firstname')
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                        @enderror
                    
                        <label class="form-label" for="form12">Last name</label>
                        <input type="text" id="" class="form-control" wire:model="lastname"  placeholder="last name"/>

                        @error('lastname')
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                        @enderror

                        <label class="form-label" for="form12">Mobile</label>
                        <input type="text" id="" class="form-control" wire:model="mobile"  placeholder="05X XXX XXXX"/>

                        @error('mobile')
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                        @enderror
                    
                        <label class="form-label" for="form12">Email</label>
                        <input type="text" id="" class="form-control" wire:model="email"  placeholder="email"/>

                        @error('email')
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                        @enderror
                        
                        <label class="form-label" for="form12">Delivery</label>

                        <select class="browser-default custom-select form-control" wire:model="delivery">
                            <option selected>Open this select menu</option>
                            <option value='store' >Delivery from the store</option>
                            <option value='ship' >Ship to address</option>
                        </select>
                        @error('delivery')
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                        @enderror



                        @if($delivery == 'ship')                    
                            <label class="form-label" for="form12">Address</label>
                            <input type="text" id="" class="form-control" wire:model="address"  placeholder="address"/>

                            @error('address')
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                            @enderror
                            <label class="form-label" for="form12">Zip code</label>
                            <input type="text" id="" class="form-control" wire:model="zipcode"  placeholder="zip code"/>

                            @error('zipcode')
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                            @enderror
                        @endif

                        <label class="form-label" for="form12">Payment</label>

                        <select class="browser-default custom-select form-control" wire:model="paymentmode">
                            <option selected>Open this select menu</option>
                            <option value='cash' >Cash</option>
                            <option value='card' >Card</option>
                        </select>
                        @error('paymentmode')
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                        @enderror

                        @if($paymentmode == 'card')           

                        <h3 class="fw-bold mb-5 mt-2 pt-1">Payment information  </h3>
                        <div class="row">
                           

                            <label class="form-label" for="form12">Card number</label>
                            <input type="text" id="" class="form-control" wire:model="card_no"  placeholder="card number"/>
    
                            @error('card_no')
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                            @enderror
                            <label class="form-label" for="form12">Expiry month</label>
                            <input type="text" class="form-control" placeholder="MM"  wire:model="exp_month">
                            @error('exp_month')
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                            @enderror
                            
                            <label class="form-label" for="form12">Expiry year</label>
                            <input type="text" class="form-control" placeholder="YYYY"  wire:model="exp_year">
                            @error('exp_year')
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                            @enderror

                            <label class="form-label" for="form12">CVC </label>
                            <input type="password"  class="form-control" placeholder="CVC"  wire:model="cvc">
                            @error('cvc')
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                            @enderror

                
                          
                        </div>



                        @endif

                        {{----
                        
                        ----}}
                        <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
                    </form>
                </div>
            </div>
            
            <div class="col-md-4">
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
                    @if($delivery == 'ship')  
                        @if ($subandtax > 87.00)
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>

                                <h5>Free</h5>
                            </div>

                        @elseif ($subandtax <= 87.00)
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>
                                <h5>10</h5>
                            </div>
                        @endif
                           
                    @endif
  
                    
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      @if ($subandtax > 87.00)
                            <h5> {{ $total }}</h5>
                      @elseif ($subandtax <= 87.00)
                            <h5> {{ $subandtaxship }}</h5>
                      @endif
                    </div>
  
                    {{----
                    <a  href="{{ route('cart.personal') }}"  class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">Next</a>
                    ----}}
                  </div> 
            </div>
        </div>

    </div>
</div>
