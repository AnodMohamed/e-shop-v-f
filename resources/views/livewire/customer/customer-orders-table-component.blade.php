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
               
                <div class=" col-3">
                    <input wire:model.debounce.300ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search  order by id ...">
                </div>
                <div class=" col-3">
                    <select wire:model="orderBy" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="id">ID</option>
                        <option value="finalltotal">Finall total</option>
                        <option value="created_at">Created at</option>
                    </select>

                </div>
                <div class="col-3  ">
                    <select wire:model="orderAsc" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="1">Asc</option>
                        <option value="0">Des</option>
                    </select>

                </div>
                <div class="col-3 ">
                    <select wire:model="perPage" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>

                </div>
                <div class="col-3 ">
                    <select wire:model="status" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="ordered">ordered</option>
                        <option value="1">Active</option>
                    </select>

                </div>
                <div class="col-3 ">
                    <select wire:model="paymentmode" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="card">Card</option>
                        <option value="cash">Cash</option>
                    </select>

                </div>
                <div class="col-3 ">
                    <select wire:model="delivery" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="store">Store</option>
                        <option value="ship">Ship</option>
                    </select>

                </div>

               
                 
            </div>
            <table class="table-auto w-full mb-6 table table-striped">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Finall total</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Payment </th>
                        <th class="px-4 py-2">Delivery </th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Control</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->finalltotal }}</td>
                        <td class="border px-4 py-2">{{ $order->status }}</td>
                        <td class="border px-4 py-2">{{ $order->paymentmode }}</td>
                        <td class="border px-4 py-2">{{ $order->delivery }}</td>
                        <td class="border px-4 py-2">{{ $order->created_at }}</td>
                        <td class="border px-4 py-2">
                            <a class="btn" href="{{ route('customer.orders.items',['order_id'=>$order->id ]) }} ">
                                <i class="fa-solid fa-clipboard-list"></i>
                            </a>
                        </td>

                    
                       
                    </tr>
                @endforeach

                </tbody>
            </table>

            {!! $orders->links() !!} 

        </div>
    </div>

</div>
