<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Products ') }}
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
                    <select wire:model="stauts" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="0">Unactive</option>
                        <option value="1">Active</option>
                    </select>

                </div>

                <div class="col-2 ">
                    <select wire:model="category" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="">All</option>
                        @foreach ($Categories as $Category )
                            <option value="{{ $Category->id }}">  {{ $Category->name }}   </option>
                       @endforeach
                    </select>

                </div>

               
                <div class="col-1 ">
                    <a href="{{ route('admin.products.add')}}" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state"  >
                         Add
                    </a>

                </div>
                 
            </div>
            <table class="table-auto w-full mb-6 table table-striped">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">
                                <a class="product-title" href="{{ route('product.view',['product_id'=>$product->id ]) }} "> {{$product->name}} </a>

                           
                            </td>
                            <td class="border px-4 py-2">{{ $product->created_at }}</td>
                            <td class="border px-4 py-2">

                                <a href="{{ route('admin.products.edit',['product_slug'=>$product->slug ]) }}"  class="btn" id="grid-state"  >
                                    <i class="fas fa-edit"></i>              
                                </a>

                               <!-- Button trigger modal -->
                                <button type="button" class="btn " data-mdb-toggle="modal" data-mdb-target="#exampleModalDelete{{ $product->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                

                                
                                <!-- Modal -->
                                <div class="modal top fade" id="exampleModalDelete{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                    <div class="modal-dialog   modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want delete {{ $product->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-mdb-dismiss="modal">
                                            No
                                            </button>
                                            <button type="button" class="btn " wire:click.prevent="deleteproduct({{$product->id}})">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>


                                @if ( $product->stauts  == '0')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn " data-mdb-toggle="modal" data-mdb-target="#examplePublishproduct{{ $product->id }}">
                                    <i class="fas fa-eye"></i>                             

                                </button>

                       
                                <div class="modal top fade" id="examplePublishproduct{{ $product->id }}" tabindex="-1" aria-labelledby="examplePublishproduct" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                    <div class="modal-dialog   modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status product</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want publish  {{ $product->name }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-mdb-dismiss="modal">
                                            No
                                            </button>
                                            <button type="button" class="btn " wire:click.prevent="publishproduct({{$product->id}})">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if ($product->stauts  == '1')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModalHidden{{ $product->id }}">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>     

                                    <div class="modal top fade" id="exampleModalHidden{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalHidden" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                        <div class="modal-dialog   modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status product</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want hidden {{ $product->name }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-mdb-dismiss="modal">
                                                No
                                                </button>
                                                <button type="button" class="btn" wire:click.prevent="hiddenproduct({{$product->id}})">Yes</button>
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

            {!! $products->links() !!} 
        </div>
    </div>

</div>
