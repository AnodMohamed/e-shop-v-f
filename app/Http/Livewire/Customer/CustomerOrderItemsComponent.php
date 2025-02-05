<?php

namespace App\Http\Livewire\Customer;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerOrderItemsComponent extends Component
{
    use WithPagination;

    public $order_id;

    public function mount($order_id)
    {

       $orderitems = OrderItem::Where('order_id',$order_id)->get();
       $this->orderitems = $orderitems;

    }

    public function render()
    {   
        $order_id = $this->order_id;
        $deliver = Delivery::where('order_id', $order_id)->first();

        return view('livewire.customer.customer-order-items-component',[
            'order' => Order::where('id', $order_id)->first()
            ,'deliver'=>$deliver

            ])->layout('layouts.app');
    }
}
