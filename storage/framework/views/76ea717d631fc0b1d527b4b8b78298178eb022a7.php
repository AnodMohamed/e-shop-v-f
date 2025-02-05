 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__('Orders ')); ?>

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
               

                 
            </div>
            <table class="table-auto w-full mb-6 table table-striped">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Customer</th>
                        <th class="px-4 py-2">Finall total</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Payment </th>
                        <th class="px-4 py-2">Delivery </th>
                        <th class="px-4 py-2">Created At</th>
                        <th class="px-4 py-2">Control</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->id); ?></td>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->user->name); ?></td>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->finalltotal); ?></td>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->status); ?></td>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->paymentmode); ?></td>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->delivery); ?></td>
                            <td class="border px-4 py-2"><?php echo e($delivery->order->created_at); ?></td>
                            <td class="border px-4 py-2">
                                <a class="btn" href="<?php echo e(route('driver.orders.items',['order_id'=>$delivery->order->id ])); ?> ">
                                    <i class="fa-solid fa-clipboard-list"></i>
                                </a>
                                    
                                <?php if($delivery->order->status  == 'delivered to the driver'): ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-mdb-toggle="modal" data-mdb-target="#exampleModalStatus<?php echo e($delivery->order->id); ?>">
                                        <i class="fas fa-check-circle"></i>
                                    </button>     

                                    <div class="modal top fade" id="exampleModalStatus<?php echo e($delivery->order->id); ?>" tabindex="-1" aria-labelledby="exampleModalStatus" aria-hidden="true" data-mdb-backdrop="true" data-mdb-keyboard="true">
                                        <div class="modal-dialog   modal-dialog-centered">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Status Job Ad</h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want change status to delivered to the customer for order number <?php echo e($delivery->order->id); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn" data-mdb-dismiss="modal">
                                                No
                                                </button>
                                                <button type="button" class="btn" wire:click.prevent="changestatus(<?php echo e($delivery->order->id); ?>)">Yes</button>
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


        </div>
    </div>

</div>
<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/driver/drive-order-table-component.blade.php ENDPATH**/ ?>