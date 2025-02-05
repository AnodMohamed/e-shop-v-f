<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <a class="text-gray-800 "   href="{{ route('admin.category') }}">Categories</a>
        {{ __(' / Edit Category') }}
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
            <form wire:submit.prevent="updateCategory">

                <label class="form-label" for="form12">Name</label>
                <input type="text" id="" class="form-control" wire:model="name" wire:keyup=" generaleslug" placeholder="name"/>
                @error('name')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>


                <label class="form-label" for="form12">Slug</label>
                <input type="text" id="" class="form-control" wire:model="slug" placeholder="slug"/>
                @error('slug')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>


                <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
            </form>
        </div>
    </div>
</div>

