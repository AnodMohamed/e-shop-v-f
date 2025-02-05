 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <a class="text-gray-800 "   href="<?php echo e(route('admin.products')); ?>">Products</a>
        <?php echo e(__(' / Add product')); ?>

    </h2>
 <?php $__env->endSlot(); ?>

<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div>
            <?php if(Session::has('message')): ?>
                <div class="text-success" role="alert">
                    <i class="fa-solid fa-circle-check"></i>  <?php echo e(Session::get('message')); ?>

                </div>
            <?php endif; ?>
            <form wire:submit.prevent="storeproduct">

                <label class="form-label" for="form12">Name</label>
                <input type="text" id="" class="form-control" wire:model="name" wire:keyup=" generaleslug" placeholder="name"/>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>


                <label class="form-label" for="form12">Slug</label>
                <input type="text" id="" class="form-control" wire:model="slug" placeholder="slug"/>
                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>

                <label class="form-label" for="form12">Weight</label>
                <input type="text" id="" class="form-control" wire:model="weight" placeholder="weight"/>
                <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>

                <label class="form-label" for="form12">Price</label>
                <input type="text" id="" class="form-control" wire:model="price" placeholder="price" />
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>

                <label class="form-label" for="form12">Quantity</label>
                <input type="text" id="" class="form-control" wire:model="quantity" placeholder="quantity" />
                <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>

                <label class="form-label" for="form12">Left quantity</label>
                <input type="text" id="" class="form-control" placeholder="left quantity"  wire:model="left_quantity" />
                <?php $__errorArgs = ['left_quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>

        
                <label class="form-label" for="form12">Category</label>
                <select class="browser-default custom-select form-control" wire:model="category_id">
                    <option selected>Open this select menu</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value='<?php echo e($category->id); ?>' ><?php echo e($category->name); ?></option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </select>
                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <br>


                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Description</label>
                      <textarea class="form-control" id="description" placeholder="description" wire:model="description"></textarea>
                    </div>
                   
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <br>

                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Usage</label>
                      <textarea class="form-control" id="usage" placeholder="usage" wire:model="usage"></textarea>
                    </div>
             
                    <?php $__errorArgs = ['usage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <br>

                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Store</label>
                      <textarea class="form-control" id="store" placeholder="store" wire:model="store"></textarea>
                    </div>
                  
                    <?php $__errorArgs = ['store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <br>

                <div class="row" wire:ignore>
                    <div class="col-md-12 mb-3">
                      <label for="validationTooltip01">Recipe</label>
                      <textarea class="form-control" id="recipe" placeholder="recipe" wire:model="recipe"></textarea>
                    </div>
                    <?php $__errorArgs = ['recipe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <br>

                <div class="outer required">
                    <div class="form-group af-inner">
                        <label  for="image"> Main Image</label>
                        <input type="file" wire:model="image" name="image" id="image"  class="form-control input-md input-file" >

                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      
                        <?php if($image): ?>
                            <div class="row">
                                <div class="col-6">
                                    <img src="<?php echo e($image->temporaryUrl()); ?>"  hieght="400" />
                                </div>
                            </div>
                        <?php endif; ?>      
                    </div>
                </div> 
                <br>

                <div class="outer required">
                    <div class="form-group af-inner">
                        <label class=" control-label">product Gallery </label>
                        <p >Select all images one time </p>
                        <input type="file" placeholder="product images" class="form-control input-md input-file" wire:model="images" multiple/>
                        <?php $__errorArgs = ['images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php if($images): ?>
                            <div class="row">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-6">
                                        <img src="<?php echo e($img->temporaryUrl()); ?>"  hieght="400" />
                                        
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                           
                            </div>
                        
                        <?php endif; ?>
                    </div>
                </div>
                <br>
            
                <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    
    $(function(){
            tinymce.init({
                selector: '#description',
                setup: function (editor) {
                    editor.on('Change', function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#description').val();
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('description', sd_data);
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
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('usage', sd_data);
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
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('store', sd_data);
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
                        window.livewire.find('<?php echo e($_instance->id); ?>').set('recipe', sd_data);
                    })
                }
            });
          
     });
 
 
    
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/admin/add-product-component.blade.php ENDPATH**/ ?>