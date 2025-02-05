 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       <a class="text-gray-800 "   href="<?php echo e(route('admin.drivers')); ?>">Drivers</a>
        <?php echo e(__(' / Add Driver')); ?>

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
            <form wire:submit.prevent="storeDriver">

                <label class="form-label" for="form12">Name</label>
                <input type="text" id="" class="form-control" wire:model="name"  placeholder="name"/>
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

                <label class="form-label" for="form12">Password</label>
                <input type="password" id="" class="form-control" wire:model="password"  name="password" placeholder="password"/>
                <?php $__errorArgs = ['password'];
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
              

                <label class="form-label" for="form12">Email</label>
                <input type="email" id="" class="form-control" wire:model="email"  placeholder="email"/>
                <?php $__errorArgs = ['email'];
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

            
                <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/admin/add-driver-component.blade.php ENDPATH**/ ?>