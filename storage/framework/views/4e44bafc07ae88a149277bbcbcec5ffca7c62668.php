




 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__(' Orders Items ')); ?>

    </h2>
 <?php $__env->endSlot(); ?>



<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div class="row">
            <div class="col-md-8">
            
                <div class="p-1">
                    <div>

                    
                        <table class="table-auto w-full mb-6 table table-striped">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Price </th>
                                    <th class="px-4 py-2">Quantity </th>
                                    
        
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $orderitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($orderitem->id); ?></td>
                                    <td>
                                        <a  href="<?php echo e(route('product.view',['product_id'=>$orderitem->product->id])); ?> "> <?php echo e($orderitem->product->name); ?> </a>
                                    </td>
        
                                    <td>
                                        <img class="h-12 w-12 rounded-full object-cover"  src="<?php echo e(asset('storage/products')); ?>/<?php echo e($orderitem->product->image); ?>" alt="<?php echo e($orderitem->product->name); ?>" />
                                    </td>
                                    <td><?php echo e($orderitem->price); ?></td>
                                    <td><?php echo e($orderitem->quantity); ?></td>
        
                                
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                            </tbody>
                        </table>
         
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="p-1">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Total   </h5>
                      <h5>SR <?php echo e($order->total); ?></h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">tax</h5>
                      <h5>SR <?php echo e($order->tax); ?></h5>
                    </div>
                    <?php if($order->delivery == 'ship'): ?>  
                        <?php if($order->total > 87.00): ?>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>

                                <h5>Free</h5>
                            </div>

                        <?php elseif($order->total <= 87.00): ?>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>
                                <h5>10</h5>
                            </div>
                        <?php endif; ?>
                           
                    <?php endif; ?>
  
                    
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                            <h5> <?php echo e($order->finalltotal); ?></h5>
                    </div>
  
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Personal Information </h3>
                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Delivery   </h5>
                        <h5> <?php echo e($order->delivery); ?></h5>
                    </div>
                    <?php if($order->delivery == 'ship'): ?>  
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase">Address   </h5>
                            <h5> <?php echo e($order->address); ?></h5>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="text-uppercase">Zip code   </h5>
                            <h5> <?php echo e($order->zipcode); ?></h5>
                        </div>
                    <?php endif; ?>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">First name   </h5>
                        <h5> <?php echo e($order->firstname); ?></h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Last name   </h5>
                        <h5> <?php echo e($order->lastname); ?></h5>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Mobile   </h5>
                        <h5> <?php echo e($order->mobile); ?></h5>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Email   </h5>
                        <h5> <?php echo e($order->email); ?></h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase">Status   </h5>
                        <h5> <?php echo e($order->status); ?></h5>
                    </div>
                    <?php if($order->paymentmode == 'card'): ?>  
                        <?php
                             $transaction = DB::table('transactions')->where('order_id',$order->id )->first();

                        ?>
                        <h5 class="text-uppercase">Transaction id   </h5>
                        <h5> <?php echo e($transaction->transaction_id); ?></h5>
                    <?php endif; ?>
                    <?php if($order->delivery == 'ship'): ?>  
                        <?php if($deliver != null): ?>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Driver   </h5>
                                <h5> <?php echo e($deliver->driver->name); ?></h5>
                            </div>
                        <?php endif; ?>
                        
                    <?php endif; ?>
                   
                  </div> 
            </div>
        </div>

    </div>
</div>

<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/customer/customer-order-items-component.blade.php ENDPATH**/ ?>