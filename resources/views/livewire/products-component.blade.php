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

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Products ') }}
    </h2>
</x-slot>

<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div>
            {{$products}}

            @if (Session::has('message'))
                <div class="text-success" role="alert">
                    <i class="fa-solid fa-circle-check"></i>  {{Session::get('message')}}
                </div>
            @endif
            <div class="flex pb-20 row">
               
                <div class=" col-2">
                    <input wire:model.debounce.300ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search  product ...">
                </div>
                <div class=" col-2">
                    <select wire:model="orderBy" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="created_at">Created at</option>
                    </select>

                </div>
                <div class="col-2  ">
                    <select wire:model="orderAsc" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="1">Ascending</option>
                        <option value="0">Descending</option>
                    </select>

                </div>
                <div class="col-1 ">
                    <select wire:model="perPage" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>

                </div>
            
                <div class="col-2 ">
                    <select wire:model="category" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="">All</option>
                        @foreach ($Categories as $Category )
                            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                       @endforeach
                    </select>

                </div>

                 
            </div>
            <div class=" row">
                @foreach ($products as $product)
                    <div class="col-md-4 p-4 " >
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('storage/products') }}/{{$product->image}}" alt="" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <h4>
                                    <a class="product-title" href="{{ route('product.view',['product_id'=>$product->id ]) }} "> {{$product->name}} </a>
                                </h4>
                                <p style="color:#02b458 ">
                                    {!!$product->price!!}
                                    <b> SR</b>
                                </p>
                                
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
                @endforeach
              

            </div>
                
             
        </div>
    </div>

</div>
