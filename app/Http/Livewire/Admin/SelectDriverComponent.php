<?php

namespace App\Http\Livewire\Admin;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class SelectDriverComponent extends Component
{
    public $order_id;
    public $driver_id;
    public function mount($order_id)
    {

       $order = Order::find($order_id);
       $this->order = $order;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'driver_id' => 'required',
        ]);
    }
    
    public function storeDriver(){

        $this->validate([
            'driver_id' => 'required',
        ]);

        $order_id = $this->order_id;

        $delivery= new Delivery();
        $delivery->order_id =  $order_id ;
        $delivery->user_id = $this->driver_id;
        $delivery->save();

        $order= Order::find($this->order_id);
        $order->status ='delivered to the driver';
        $order->update();

        session()->flash('message','Order has been changed successfully!');
        return redirect()->route('admin.orders');

    }
    
    public function render()
    {
        $order_id = $this->order_id;

        return view('livewire.admin.select-driver-component',[
            'drivers'=>User::where('utype','DRV')->get()
            ,'order_id'=>$order_id])->layout('layouts.app');
    }
}
