 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__('Drivers ')); ?>

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
               
                <div class=" col-4">
                    <input wire:model.debounce.300ms="search" type="text" class=" appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search  driver ...">
                </div>
                <div class=" col-2">
                    <select wire:model="orderBy" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="id">ID</option>
                        <option value="name">Name</option>
                        <option value="email">Email</option>
                        <option value="created_at">Created at</option>
                    </select>

                </div>
                <div class="col-2  ">
                    <select wire:model="orderAsc" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option value="1">Ascending</option>
                        <option value="0">Descending</option>
                    </select>

                </div>
                <div class="col-2">
                    <select wire:model="perPage" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>

                </div>
                

               

               
                <div class="col-2 ">
                    <a href="<?php echo e(route('admin.drivers.add')); ?>" class=" block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state"  >
                         Add
                    </a>

                </div>
                 
            </div>
            <table class="table-auto w-full mb-6 table table-striped">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Image</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Control</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo e($driver->id); ?></td>
                            <td class="border px-4 py-2">
                                <?php if($driver->profile_photo_path == NULL): ?>
                                    <img class="h-12 w-12 rounded-full object-cover" src="<?php echo e(asset('storage/profile-photos/user.png')); ?>" alt="<?php echo e($driver->name); ?>" />
                                <?php else: ?>
                                    <img class="h-12 w-12 rounded-full object-cover" src="<?php echo e(asset('storage')); ?>/<?php echo e($driver->profile_photo_path); ?>" alt="<?php echo e($driver->name); ?>" />
                                <?php endif; ?>
                            </td>
                            <td class="border px-4 py-2">
                                <?php echo e($driver->name); ?> 
                            </td>
                            <td class="border px-4 py-2">
                                <?php echo e($driver->email); ?> 
                            </td>
                            <td class="border px-4 py-2"><?php echo e($driver->created_at); ?></td>
                            <td class="border px-4 py-2">


                            <!-- Button trigger modal -->
                                <button type="button" class="btn " data-mdb-toggle="modal" data-mdb-target="#exampleModalDelete<?php echo e($driver->id); ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>

                                

                                
                                <!-- Modal -->
                                <div class="modal top fade" id="exampleModalDelete<?php echo e($driver->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                    <div class="modal-dialog   modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete driver</h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Are you sure you want delete <?php echo e($driver->name); ?>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn " data-mdb-dismiss="modal">
                                            No
                                            </button>
                                            <button type="button" class="btn " wire:click.prevent="deletedriver(<?php echo e($driver->id); ?>)">Yes</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                       

                            </td>

                        
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

          
        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/admin/admin-driver-table-component.blade.php ENDPATH**/ ?>