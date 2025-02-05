<?php

namespace App\Http\Livewire\Driver;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DriveOrderTableComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $orderBy = 'id';
    public $orderAsc = true;


    public function changestatus($id)
    {
        $order =Order::find($id);
        $order->status = 'delivered to the customer';
        $order->update();
        session()->flash('message','The status has been changged successfully!');
        return redirect()->route('driver.orders');

   
    }

    public function render()
    {
        return view('livewire.driver.drive-order-table-component',[
            'deliveries' => Delivery::where('user_id', Auth::user()->id )
                        ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                        ->simplePaginate($this->perPage)

        ])->layout('layouts.app');
    }
}
