




<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __(' Orders Items ') }}
    </h2>
</x-slot>



<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div class="row">
            <div class="col-md-8">
            
                <div class="p-1">
                    <div>
                  
                        <div class="flex pb-20 row">
                    
                            @if($order->delivery == 'ship')  
                                @if ($deliver  == null)
                                    <div class="col-3 ">
                                            
                                        <a href="{{ route('admin.orders.selectdriver',['order_id'=>$order->id ]) }}"  class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state"   >
                                            Select Driver             
                                        </a>
                                    </div>
                                @endif
                                    
                            @endif
                           
                        
                            
                        </div>
                    
                        <table class="table-auto w-full mb-6 table table-striped">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Price </th>
                                    <th class="px-4 py-2">Quantity </th>
                                    
        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderitems as $orderitem)
                                <tr>
                                    <td>{{$orderitem->id}}</td>
                                    <td>
                                        <a  href="{{ route('product.view',['product_id'=>$orderitem->product->id]) }} "> {{$orderitem->product->name}} </a>
                                    </td>
        
                                    <td>
                                        <img class="h-12 w-12 rounded-full object-cover"  src="{{ asset('storage/products') }}/{{$orderitem->product->image}}" alt="{{$orderitem->product->name}}" />
                                    </td>
                                    <td>{{$orderitem->price}}</td>
                                    <td>{{$orderitem->quantity}}</td>
        
                                
                                </tr>
                            @endforeach
        
                            </tbody>
                        </table>
         
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="p-1">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Total   </h5>
                      <h5>SR {{$order->total}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">tax</h5>
                      <h5>SR {{$order->tax}}</h5>
                    </div>
                    @if($order->delivery == 'ship')  
                        @if ($order->total > 87.00)
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>

                                <h5>Free</h5>
                            </div>

                        @elseif ($order->total <= 87.00)
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>
                                <h5>10</h5>
                            </div>
                        @endif
                           
                    @endif
  
                    
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                            <h5> {{ $order->finalltotal }}</h5>
                    </div>
  
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Personal Information </h3>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Delivery   </h5>
                        <h5> {{$order->delivery}}</h5>
                    </div>
                    @if($order->delivery == 'ship')  
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase">Address   </h5>
                            <h5> {{$order->address}}</h5>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase">Zip code   </h5>
                            <h5> {{$order->zipcode}}</h5>
                        </div>
                    @endif
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">First name   </h5>
                        <h5> {{$order->firstname}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Last name   </h5>
                        <h5> {{$order->lastname}}</h5>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Mobile   </h5>
                        <h5> {{$order->mobile}}</h5>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Email   </h5>
                        <h5> {{$order->email}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Status   </h5>
                        <h5> {{$order->status}}</h5>
                    </div>
                    @if($order->paymentmode == 'card')  
                        @php
                             $transaction = DB::table('transactions')->where('order_id',$order->id )->first();

                        @endphp
                        <h5 class="text-uppercase">Transaction id   </h5>
                        <h5> {{$transaction->transaction_id}}</h5>
                    @endif
                    @if($order->delivery == 'ship')  
                        @if ($deliver != null)
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Driver   </h5>
                                <h5> {{$deliver->driver->name}}</h5>
                            </div>
                        @endif
                        
                    @endif
                  </div> 
            </div>
        </div>

    </div>
</div>

