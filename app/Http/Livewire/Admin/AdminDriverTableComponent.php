<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDriverTableComponent extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    


    public function deletedriver($id)
    {
        $user =User::find($id);
        $user->delete();
        session()->flash('message','Driver has been deleted successfully!');
        return redirect()->route('admin.drivers');

    }
    

    public function render()
    {
        return view('livewire.admin.admin-driver-table-component', [
            'drivers' => User::search($this->search)
                ->where('utype', 'DRV' )
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage)
                ])->layout('layouts.app');
    }
}
