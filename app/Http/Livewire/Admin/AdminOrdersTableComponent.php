<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrdersTableComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $status = 'ordered';
    public $paymentmode = 'card';
    public $delivery = 'store';


    
    public function changestatus($id)
    {
        $order =Order::find($id);
        $order->status = 'delivered to the customer';
        $order->update();
        session()->flash('message','The status has been changged successfully!');
        return redirect()->route('admin.orders');

   
    }

    public function render()
    {
        return view('livewire.admin.admin-orders-table-component',[
            
            'orders' => Order::search($this->search)
                ->where('status', $this->status )
                ->where('paymentmode', $this->paymentmode )
                ->where('delivery', $this->delivery )
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage)
               ])->layout('layouts.app');
    }
}
