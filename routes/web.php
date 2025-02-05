<?php

use App\Http\Controllers\CartController;
use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddDriverComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminDriverTableComponent;
use App\Http\Livewire\Admin\AdminOrderitemsComponent;
use App\Http\Livewire\Admin\AdminOrdersTableComponent;
use App\Http\Livewire\Admin\AdminProductTableComponent;
use App\Http\Livewire\Admin\CategoryTableComponent;
use App\Http\Livewire\Admin\EditCategoryComponent;
use App\Http\Livewire\Admin\EditProductComponent;
use App\Http\Livewire\Admin\SelectDriverComponent;
use App\Http\Livewire\Customer\CustomerDoneComponent;
use App\Http\Livewire\Customer\CustomerOrderItemsComponent;
use App\Http\Livewire\Customer\CustomerOrdersTableComponent;
use App\Http\Livewire\Customer\CustomerPersonalInformationComponent;
use App\Http\Livewire\Driver\DriveOrderTableComponent;
use App\Http\Livewire\Driver\DriverOrderitemsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductsComponent;
use App\Http\Livewire\ShippingCartComponent;
use App\Http\Livewire\ViewProductComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', HomeComponent::class)->name('home');
Route::POST ('/add',[CartController::class, 'add'] )->name('cart.add');
Route::POST ('/delete',[CartController::class,'delete'] )->name('cart.delete');
Route::POST ('/updatequantity',[CartController::class,'updatequantity'] )->name('cart.updatequantity');
Route::get ('/empty',[CartController::class,'empty'] )->name('cart.empty');
Route::get('/cart/show', ShippingCartComponent::class)->name('cart.show');
Route::get('/products', ProductsComponent::class)->name('products');
Route::get('/productsAd/view/{product_id:id}', ViewProductComponent::class)->name('product.view');

Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    
    Route::get('/admin/category', CategoryTableComponent::class)->name('admin.category');
    Route::get('/admin/category/edit/{category_slug:slug}', EditCategoryComponent::class)->name('admin.category.edit');
    Route::get('/admin/category/add', AddCategoryComponent::class)->name('admin.category.add');
    Route::get('/admin/products', AdminProductTableComponent::class)->name('admin.products');
    Route::get('/admin/products/add', AddProductComponent::class)->name('admin.products.add');
    Route::get('/admin/products/edit/{product_slug:slug}', EditProductComponent::class)->name('admin.products.edit');
    Route::get('/admin/drivers', AdminDriverTableComponent::class)->name('admin.drivers');
    Route::get('/admin/drivers/add', AddDriverComponent::class)->name('admin.drivers.add');
    Route::get('/admin/orders', AdminOrdersTableComponent::class)->name('admin.orders');
    Route::get('/admin/orders/items/{order_id:id}', AdminOrderitemsComponent::class)->name('admin.orders.items');
    Route::get('/admin/orders/selectdriver/{}order_id:id', SelectDriverComponent::class)->name('admin.orders.selectdriver');


});
Route::middleware(['auth:sanctum','verified','authCustomer'])->group(function(){
    Route::get('/cart/personal', CustomerPersonalInformationComponent::class)->name('cart.personal');
    Route::get('/cart/done', CustomerDoneComponent::class)->name('cart.done');
    Route::get('/customer/orders', CustomerOrdersTableComponent::class)->name('customer.orders');
    Route::get('/customer/orders/items/{order_id:id}', CustomerOrderItemsComponent::class)->name('customer.orders.items');


});
Route::middleware(['auth:sanctum','verified','authDriver'])->group(function(){
    Route::get('/driver/orders', DriveOrderTableComponent::class)->name('driver.orders');
    Route::get('/driver/orders/items/{order_id:id}', DriverOrderitemsComponent::class)->name('driver.orders.items');

});

