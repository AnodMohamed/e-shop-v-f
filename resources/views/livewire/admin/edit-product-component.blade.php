<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <a class="text-gray-800 "   href="{{ route('admin.products') }}">Products</a>
        {{ __(' / Edit Product') }}
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
            <form wire:submit.prevent="updateProduct">

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

                <label class="form-label" for="form12">Weight</label>
                <input type="text" id="" class="form-control" wire:model="weight" placeholder="weight"/>
                @error('weight')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>

                <label class="form-label" for="form12">Price</label>
                <input type="text" id="" class="form-control" wire:model="price" placeholder="price" />
                @error('price')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>

                <label class="form-label" for="form12">Quantity</label>
                <input type="text" id="" class="form-control" wire:model="quantity" placeholder="quantity" />
                @error('quantity')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>

                <label class="form-label" for="form12">Left quantity</label>
                <input type="text" id="" class="form-control" placeholder="left quantity"  wire:model="left_quantity" />
                @error('left_quantity')
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                @enderror
                <br>

        
                <label class="form-label" for="form12"></label>
                <select class="browser-default custom-select form-control" wire:model="category_id">
                    <option selected>Open this select menu</option>
                    @foreach ($categories as $category)
                        <option value='{{ $category->id}}' >{{ $category->name}}</option>

                    @endforeach
                    @error('category_id')
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                    @enderror
                </select>
                <br>


                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Description</label>
                      <textarea class="form-control" id="description" placeholder="description" wire:model="description"></textarea>
                    </div>
                   
                    @error('description')
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                    @enderror
                </div>
                <br>

                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Usage</label>
                      <textarea class="form-control" id="usage" placeholder="usage" wire:model="usage"></textarea>
                    </div>
             
                    @error('usage')
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                    @enderror
                </div>
                <br>

                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Store</label>
                      <textarea class="form-control" id="store" placeholder="store" wire:model="store"></textarea>
                    </div>
                  
                    @error('store')
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                    @enderror
                </div>
                <br>

                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Recipe</label>
                      <textarea class="form-control" id="recipe" placeholder="recipe" wire:model="store"></textarea>
                    </div>
                    @error('recipe')
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> {{$message}}</p>
                    @enderror
                </div>


                <br>
                    

                <div class="outer required">
                    <div class="form-group af-inner">
                        <label  for="image"> Main Image</label>
                        <input type="file" placeholder="Product Image" class="form-control input-md input-file" wire:model="new_image"/>

                        @error('new_image')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    
                            <div class="row">
                                @if ($new_image)
                                    <div class="col-6">
                                        <label  for="image"> New Image</label>
                                        <img src="{{$new_image->temporaryUrl()}}"  style="height: 300px" />
                                    </div>
                                @endif   
                                <div class="col-6">
                                    <label  for="image"> Currently image</label>
                                    <img src="{{ asset('storage/products') }}/{{$image}}" style="height: 300px" >
    
                                </div>
                            </div>

                    </div>
                </div> 

                <br>
                        

                <label class=" control-label">Product Gallery </label>
                <p class="text-secondary">Select all images one time </p>
                <input type="file" placeholder="Product images" class="form-control input-md input-file" wire:model="new_images" multiple/>
                @error('new_images')
                    <p class="text-danger">{{$message}}</p>
                @enderror


                <div class="outer required">
                    <div class="form-group af-inner">

                        @error('new_images')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                        @enderror
                    
                            <div class="row">
                                
                                @if ($new_images)
                                    <label  for="image"> New Images</label>

                                    @foreach ($new_images as $img)
                                        <div class="col-6">
                                            <img src="{{$img->temporaryUrl()}}"  style="height: 300px" />
                                        </div>
                                    @endforeach
                                @endif
                            
                               <label  for="image"> Currently images</label>

                               @foreach ($imagex as $img )
                                        @if(!empty($img))
                                            <div class="col-6">
                                                <img src="{{ asset('storage/gallery') }}/{{$img}}" style="height: 300px" >
                                            </div>
                                        @endif
                                @endforeach

                            </div>

      
                    </div>
                </div> 
                <br>
            
                <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    
    $(function(){
            tinymce.init({
                selector: '#description',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        @this.set('description', sd_data);
                    })
                }
            });
          
     });

     $(function(){
            tinymce.init({
                selector: '#usage',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#usage').val();
                        @this.set('usage', sd_data);
                    })
                }
            });
          
     });

     $(function(){
            tinymce.init({
                selector: '#store',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#store').val();
                        @this.set('store', sd_data);
                    })
                }
            });
          
     });

     $(function(){
            tinymce.init({
                selector: '#recipe',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#recipe').val();
                        @this.set('recipe', sd_data);
                    })
                }
            });
          
     });
 
 
    
</script>
@endpush
