<?php $__env->startPush('styles'); ?>
<style>
.wrapper-progressBar {
    width: 100%
}

.progressBar {
}

.progressBar li {
    list-style-type: none;
    float: left;
    width: 33%;
    position: relative;
    text-align: center;
}

.progressBar li:before {
    content: " ";
    line-height: 30px;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    display: block;
    text-align: center;
    margin: 0 auto 10px;
    background-color: white
}

.progressBar li:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 4px;
    background-color: #ddd;
    top: 15px;
    left: -50%;
    z-index: -1;
}

.progressBar li:first-child:after {
    content: none;
}

.progressBar li.active {
    color: #02b458;
}

.progressBar li.active:before {
    border-color: #02b458;
    background-color: #02b458;
}

.progressBar .active:after {
    background-color: #02b458;
}

</style> 
<?php $__env->stopPush(); ?>


 <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <?php echo e(__(' Shopping Cart')); ?>

    </h2>
 <?php $__env->endSlot(); ?>

<?php

    
    $items =\Gloudemans\Shoppingcart\Facades\Cart::content('items');
    $subtotal=\Gloudemans\Shoppingcart\Facades\Cart::subtotal();
    $tax=\Gloudemans\Shoppingcart\Facades\Cart::tax();
    $subandtax=$subtotal + $tax ;
    $subandtaxship=$subtotal + $tax + 10;
    $total=\Gloudemans\Shoppingcart\Facades\Cart::total();
    $count=\Gloudemans\Shoppingcart\Facades\Cart::count();
?>

<div class="py-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="container-sm px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">

        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-xs-12 col-md-11  block border m-auto">
                      <div class="wrapper-progressBar">
                        <ul class="progressBar">
                          <li class="active">Order Information </li>
                          <li class="active">Personal information </li>
                          <li class="">Done</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Personal information  </h3>
                    <hr class="my-4">
                    <?php if(Session::has('message')): ?>
                        <div class="text-success" role="alert">
                            <i class="fa-solid fa-circle-check"></i>  <?php echo e(Session::get('message')); ?>

                        </div>
                    <?php endif; ?>

                    
                    <form wire:submit.prevent="storeOrder"  data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>">

                        <label class="form-label" for="form12">First name</label>
                        <input type="text" id="" class="form-control" wire:model="firstname"  placeholder="first name"/>

                        <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                        <label class="form-label" for="form12">Last name</label>
                        <input type="text" id="" class="form-control" wire:model="lastname"  placeholder="last name"/>

                        <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <label class="form-label" for="form12">Mobile</label>
                        <input type="text" id="" class="form-control" wire:model="mobile"  placeholder="05X XXX XXXX"/>

                        <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                        <label class="form-label" for="form12">Email</label>
                        <input type="text" id="" class="form-control" wire:model="email"  placeholder="email"/>

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
                        
                        <label class="form-label" for="form12">Delivery</label>

                        <select class="browser-default custom-select form-control" wire:model="delivery">
                            <option selected>Open this select menu</option>
                            <option value='store' >Delivery from the store</option>
                            <option value='ship' >Ship to address</option>
                        </select>
                        <?php $__errorArgs = ['delivery'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                        <?php if($delivery == 'ship'): ?>                    
                            <label class="form-label" for="form12">Address</label>
                            <input type="text" id="" class="form-control" wire:model="address"  placeholder="address"/>

                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label class="form-label" for="form12">Zip code</label>
                            <input type="text" id="" class="form-control" wire:model="zipcode"  placeholder="zip code"/>

                            <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <?php endif; ?>

                        <label class="form-label" for="form12">Payment</label>

                        <select class="browser-default custom-select form-control" wire:model="paymentmode">
                            <option selected>Open this select menu</option>
                            <option value='cash' >Cash</option>
                            <option value='card' >Card</option>
                        </select>
                        <?php $__errorArgs = ['paymentmode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <?php if($paymentmode == 'card'): ?>           

                        <h3 class="fw-bold mb-5 mt-2 pt-1">Payment information  </h3>
                        <div class="row">
                           

                            <label class="form-label" for="form12">Card number</label>
                            <input type="text" id="" class="form-control" wire:model="card_no"  placeholder="card number"/>
    
                            <?php $__errorArgs = ['card_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <label class="form-label" for="form12">Expiry month</label>
                            <input type="text" class="form-control" placeholder="MM"  wire:model="exp_month">
                            <?php $__errorArgs = ['exp_month'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            
                            <label class="form-label" for="form12">Expiry year</label>
                            <input type="text" class="form-control" placeholder="YYYY"  wire:model="exp_year">
                            <?php $__errorArgs = ['exp_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> <?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <label class="form-label" for="form12">CVC </label>
                            <input type="password"  class="form-control" placeholder="CVC"  wire:model="cvc">
                            <?php $__errorArgs = ['cvc'];
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



                        <?php endif; ?>

                        
                        <button type="submit" class="btn  mt-5 m-auto" style="display:flex; background: #02b458; color:#fff">Submit</button>
                    </form>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">items  <?php echo e($count); ?>  </h5>
                      <h5>SR <?php echo e($subtotal); ?></h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">tax</h5>
                      <h5>SR <?php echo e($tax); ?></h5>
                    </div>
                    <?php if($delivery == 'ship'): ?>  
                        <?php if($subandtax > 87.00): ?>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>

                                <h5>Free</h5>
                            </div>

                        <?php elseif($subandtax <= 87.00): ?>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="text-uppercase">Shipping</h5>
                                <h5>10</h5>
                            </div>
                        <?php endif; ?>
                           
                    <?php endif; ?>
  
                    
                    <hr class="my-4">
  
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <?php if($subandtax > 87.00): ?>
                            <h5> <?php echo e($total); ?></h5>
                      <?php elseif($subandtax <= 87.00): ?>
                            <h5> <?php echo e($subandtaxship); ?></h5>
                      <?php endif; ?>
                    </div>
  
                    
                  </div> 
            </div>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\xampp\E-Shop_Vegetable_and_Fruit_organic\resources\views/livewire/customer/customer-personal-information-component.blade.php ENDPATH**/ ?>