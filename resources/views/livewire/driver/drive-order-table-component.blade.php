<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Orders ') }}
    </h2>
</x-slot>

<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div>

            @if (Session::has('message'))
                <div class="text-success" role="alert">
                    <i class="fa-solid fa-circle-check"></i>  {{Session::get('message')}}
                </div>
            @endif
            <div class="flex pb-20 row">
               

                 
            </div>
            <table class="table-auto w-full mb-6 table table-striped">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Customer</th>
                        <th class="px-4 py-2">Finall total</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Payment </th>
                        <th class="px-4 py-2">Delivery </th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Control</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ( $deliveries as $delivery )
                        <tr>
                            <td class="border px-4 py-2">{{ $delivery->order->id }}</td>
                            <td class="border px-4 py-2">{{ $delivery->order->user->name }}</td>
                            <td class="border px-4 py-2">{{ $delivery->order->finalltotal }}</td>
                            <td class="border px-4 py-2">{{ $delivery->order->status }}</td>
                            <td class="border px-4 py-2">{{ $delivery->order->paymentmode }}</td>
                            <td class="border px-4 py-2">{{ $delivery->order->delivery }}</td>
                            <td class="border px-4 py-2">{{ $delivery->order->created_at }}</td>
                            <td class="border px-4 py-2">
                                <a class="btn" href="{{ route('driver.orders.items',['order_id'=>$delivery->order->id ]) }} ">
                                    <i class="fa-solid fa-clipboard-list"></i>
                                </a>
                                    
                                @if ($delivery->order->status  == 'delivered to the driver')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModalStatus{{ $delivery->order->id }}">
                                        <i class="fas fa-check-circle"></i>
                                    </button>     

                                    <div class="modal top fade" id="exampleModalStatus{{ $delivery->order->id }}" tabindex="-1" aria-labelledby="exampleModalStatus" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                        <div class="modal-dialog   modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status Job Ad</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want change status to delivered to the customer for order number {{ $delivery->order->id }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-mdb-dismiss="modal">
                                                No
                                                </button>
                                                <button type="button" class="btn" wire:click.prevent="changestatus({{$delivery->order->id}})">Yes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endif
                            
                                        
                                        
        
                            </td>

                        
                        
                        </tr>
                       


                    @endforeach 
                        
                    
                   
                </tbody>
            </table>


        </div>
    </div>

</div>
