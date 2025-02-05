<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <a class="text-gray-800 " href="{{ route('admin.orders') }}">Orders</a>
        {{ __(' /Select Driver') }}
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
            <form wire:submit.prevent="storeDriver">

                <label class="form-label" for="form12">Select driver</label>
                <select class="browser-default custom-select form-control" wire:model="driver_id">
                    <option selected>Open this select menu</option>
                    @foreach ($drivers as $driver)
                        <option value='{{ $driver->id}}' > 
                          <span class="px-2">  {{ $driver->name}}  </span> 
                    </option>

                    @endforeach
                   
                </select>
                @error('slug')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
            </form>
        </div>
    </div>
</div>
