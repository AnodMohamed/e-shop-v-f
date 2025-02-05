 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__('Products ')); ?>

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
                        <?php $__currentLoopData = $Categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($Category->id); ?>">  <?php echo e($Category->name); ?>   </option>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>

               
                <div class="col-1 ">
                    <a href="<?php echo e(route('admin.products.add')); ?>" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state"  >
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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo e($product->id); ?></td>
                            <td class="border px-4 py-2">
                                <a class="product-title" href="<?php echo e(route('product.view',['product_id'=>$product->id ])); ?> "> <?php echo e($product->name); ?> </a>

                           
                            </td>
                            <td class="border px-4 py-2"><?php echo e($product->created_at); ?></td>
                            <td class="border px-4 py-2">

                                <a href="<?php echo e(route('admin.products.edit',['product_slug'=>$product->slug ])); ?>"  class="btn" id="grid-state"  >
                                    <i class="fas fa-edit"></i>              
                                </a>

                               <!-- Button trigger modal -->
                                <button type="button" class="btn " data-mdb-toggle="modal" data-mdb-target="#exampleModalDelete<?php echo e($product->id); ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                

                                
                                <!-- Modal -->
                                <div class="modal top fade" id="exampleModalDelete<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                    <div class="modal-dialog   modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete product</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want delete <?php echo e($product->name); ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-mdb-dismiss="modal">
                                            No
                                            </button>
                                            <button type="button" class="btn " wire:click.prevent="deleteproduct(<?php echo e($product->id); ?>)">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>


                                <?php if( $product->stauts  == '0'): ?>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn " data-mdb-toggle="modal" data-mdb-target="#examplePublishproduct<?php echo e($product->id); ?>">
                                    <i class="fas fa-eye"></i>                             

                                </button>

                       
                                <div class="modal top fade" id="examplePublishproduct<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="examplePublishproduct" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                    <div class="modal-dialog   modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status product</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want publish  <?php echo e($product->name); ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-mdb-dismiss="modal">
                                            No
                                            </button>
                                            <button type="button" class="btn " wire:click.prevent="publishproduct(<?php echo e($product->id); ?>)">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php if($product->stauts  == '1'): ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModalHidden<?php echo e($product->id); ?>">
                                        <i class="fas fa-eye-slash"></i>
                                    </button>     

                                    <div class="modal top fade" id="exampleModalHidden<?php echo e($product->id); ?>" tabindex="-1" aria-labelledby="exampleModalHidden" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                        <div class="modal-dialog   modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status product</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want hidden <?php echo e($product->name); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-mdb-dismiss="modal">
                                                No
                                                </button>
                                                <button type="button" class="btn" wire:click.prevent="hiddenproduct(<?php echo e($product->id); ?>)">Yes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
    
                                <?php endif; ?>
                         

                            </td>

                           
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo $products->links(); ?> 
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/admin/admin-product-table-component.blade.php ENDPATH**/ ?>