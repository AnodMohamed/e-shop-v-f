<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <a class="text-gray-800 "   href="{{ route('admin.drivers') }}">Drivers</a>
        {{ __(' / Add Driver') }}
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

                <label class="form-label" for="form12">Name</label>
                <input type="text" id="" class="form-control" wire:model="name"  placeholder="name"/>
                @error('name')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>

                <label class="form-label" for="form12">Password</label>
                <input type="password" id="" class="form-control" wire:model="password"  name="password" placeholder="password"/>
                @error('password')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>
              

                <label class="form-label" for="form12">Email</label>
                <input type="email" id="" class="form-control" wire:model="email"  placeholder="email"/>
                @error('email')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>



                <div class="outer required">
                    <div class="form-group af-inner">
                        <label  for="image"> Main Image</label>
                        <input type="file" wire:model="image" name="image" id="image"  class="form-control input-md input-file" >

                        @error('image')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                      
                        @if ($image)
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{$image->temporaryUrl()}}"  hieght="400" />
                                </div>
                            </div>
                        @endif      
                    </div>
                </div> 
                <br>

            
                <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
            </form>
        </div>
    </div>
</div>


