<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class CustomerOrdersTableComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public $status = 'ordered';
    public $paymentmode = 'card';
    public $delivery = 'store';


    public function render()
    {

        return view('livewire.customer.customer-orders-table-component',[
            
            'orders' => Order::search($this->search)
                ->where('user_id', Auth::user()->id)
                ->Where('status', $this->status )
                ->Where('paymentmode', $this->paymentmode )
                ->Where('delivery', $this->delivery )
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage)
               ])->layout('layouts.app');

            
        
    }
}
