<style>
    body{background-color: #000}.card{border:none}
   .product{background-color: #fff}
   .brand{font-size: 13px}
   .act-price{color: #02b458;font-weight: 700}
   .dis-price{text-decoration: line-through}
   .about{font-size: 14px}.color{margin-bottom:10px}
   label.radio{cursor: pointer}
   label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}
   label.radio span{padding: 2px 9px;border: 2px solid #02b458;display: inline-block;color: #02b458;border-radius: 3px;text-transform: uppercase}
   label.radio input:checked+span{border-color: #02b458;background-color: #02b458;color: #fff}
  .btn-danger{background-color: #02b458 !important;border-color: #02b458 !important}
  .btn-danger:hover{background-color: #02b458 !important;border-color: #02b458 !important}
  .btn-danger:focus{box-shadow: none}.cart i{margin-right: 10px}
  .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {color: #02b458;border-color: #02b458;}
  .ba-gr{ background-color: #02b458; color: #fff; padding: 2px 7px;} 
  .add_cart_btn { color: #fff;background: #02b458;padding: 10px 15px;border-radius:50px; border: 2px solid #02b458;}
  .add_cart_btn:hover { color: #02b458;background: none;padding: 10px 15px;border: 2px solid #02b458; border: 2px solid #02b458;}
  .in-cart{color: #fff;background: #02b458;padding: 10px 15px;border-radius:50px; border: 2px solid #02b458;}

</style>


<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                         
                            <div class="thumbnail text-center"> 
                                <div class="text-center p-4"> 
                                    <img id="main-image" src="{{ asset('storage/products') }}/{{ $product->image }}"  style="width: 100%; hightet:300px !important ;" />

                                 </div>

                                 <div class="row">
                                    @foreach ($imagex as $img )
                                         @if(!empty($img))
                                    
                                            <div class="col-xs-2 col-sm-2 col-md-3" >
                                                <a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [0,300]);">
                                                    <img onclick="change_image(this)" src="{{ asset('storage/gallery') }}/{{ $img }}" width="70"> 

                                                </a>
                                            </div>
                                            
                                        @endif
                                    @endforeach

                                 </div>
                            
  
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                      
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">{{ $product->category->name }}</span>
                                <h5 class="text-uppercase">{{$product->name}}</h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">{{$product->price}}  SR</span>
                                </div>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-muted">Weight:  <span class="ba-gr">{{ $product->weight }}</span> </span></div>
                            <div class="mt-4 mb-3 ">
                               @php
                                $percent = $product->left_quantity /  $product->quantity  * 100;
                               @endphp
                               
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar" role="progressbar" style="width:{{$percent}}%; background-color: #02b458;" aria-valuenow="{{ $product->left_quantity }}" aria-valuemin="0" aria-valuemax="{{ $product->quantity }}"></div>
                                 </div>
                                 <p >only <span style="font-weight: 600">{{  $product->left_quantity }} </span>  left</p>

                            </div>

                       
                            @if (Auth::check() == '1' )

                                @if (Auth::user()->utype ==='ADM' || Auth::user()->utype === 'DRV' )
                                
                                @elseif(Auth::user()->utype === 'Cust')
                                
                                    <div class="mt-4 mb-3 "> 
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
                                    
                                @endif 


                            @else
                                <div class="mt-4 mb-3 "> 
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
                            @endif
                           

                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-3 mt-4" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link active"
                                    id="ex1-tab-1"
                                    data-mdb-toggle="tab"
                                    href="#ex1-tabs-1"
                                    role="tab"
                                    aria-controls="ex1-tabs-1"
                                    aria-selected="true"
                                    >Description</a
                                >
                                </li>
                                <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link"
                                    id="ex1-tab-2"
                                    data-mdb-toggle="tab"
                                    href="#ex1-tabs-2"
                                    role="tab"
                                    aria-controls="ex1-tabs-2"
                                    aria-selected="false"
                                    >Usage</a
                                >
                                </li>
                                <li class="nav-item" role="presentation">
                                <a
                                    class="nav-link"
                                    id="ex1-tab-3"
                                    data-mdb-toggle="tab"
                                    href="#ex1-tabs-3"
                                    role="tab"
                                    aria-controls="ex1-tabs-3"
                                    aria-selected="false"
                                    >Store </a
                                >
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a
                                    class="nav-link"
                                    id="ex1-tab-4"
                                    data-mdb-toggle="tab"
                                    href="#ex1-tabs-4"
                                    role="tab"
                                    aria-controls="ex1-tabs-4"
                                    aria-selected="false"
                                    >Recipe </a
                                    >
                                </li>
                            </ul>
                            <!-- Tabs navs -->
                            
                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content">
                                <div
                                    class="tab-pane fade show active"
                                    id="ex1-tabs-1"
                                    role="tabpanel"
                                    aria-labelledby="ex1-tab-1"
                                    >
                                        {!! $product->description!!}
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                        {!! $product->usage!!}
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                        {!! $product->store!!}
                                    </div>
                                    <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                                        {!! $product->recipe!!}
                                </div>
                            </div>
                            <!-- Tabs content -->
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function change_image(image){

        var container = document.getElementById("main-image");

        container.src = image.src;
        }

            document.addEventListener("DOMContentLoaded", function(event) {

        });
    </script>  
@endpush
