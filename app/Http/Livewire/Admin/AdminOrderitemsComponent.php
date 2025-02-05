<?php

namespace App\Http\Livewire\Admin;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrderitemsComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $orderBy = 'id';
    public $orderAsc = true;  

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
        return view('livewire.admin.admin-orderitems-component',[
            'order' => Order::where('id', $order_id)->first()
            ,'deliver'=>$deliver
            ])->layout('layouts.app');
    }
}
