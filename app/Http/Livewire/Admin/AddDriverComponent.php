<?php

namespace App\Http\Livewire\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;


class AddDriverComponent extends Component
{
    use PasswordValidationRules;
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $image;


    public function updated($fields){
        $this->validateOnly($fields,[

            'name' => ['required', 'string', 'max:255' , 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>['required', 'string','min:8'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],

        ]);
    }
    public function storeDriver(){

        $this->validate([
            'name' => ['required', 'string', 'max:255' , 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>['required', 'string','min:8'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],

        ]);
       

        $driver= new User();
        $driver->name = $this->name;
        $driver->email = $this->email;
        $driver->password = Hash::make($this->password);
        $driver->utype = "DRV";

        if($this->image){
            $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
            $imageNameinDB='profile-photos/'.$imageName.'';
            $this->image->storeAs('profile-photos', $imageName , 'public');
            $driver->profile_photo_path = $imageNameinDB;  
        }
        

        $driver->save();
        session()->flash('message','Driver has been created successfully!');
        return redirect()->route('admin.drivers');

    }

    public function render()
    {
        return view('livewire.admin.add-driver-component')->layout('layouts.app');

    }
}
