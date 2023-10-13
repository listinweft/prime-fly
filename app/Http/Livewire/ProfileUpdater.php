<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Customer;

class ProfileUpdater extends Component
{
    public $first_name;
    public $last_name;
    public $phone_number;

    public function mount()
    {
        $user = Auth::guard('customer')->user();
        $this->first_name = $user->customer->first_name;
        $this->last_name = $user->customer->last_name;
        $this->phone_number = $user->phone;
    }

    public function updateProfile()
    {
        $request = request();
        $user = Auth::guard('customer')->user();
        $customer = $user->customer;

        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:customers,first_name,'.$customer->id,
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:customers,last_name,'.$customer->id,
            'phone_number' => 'required|regex:/^([0-9\+]*)$/|min:7|max:20|unique:users,phone,' . $user->id,
        ]);

        \DB::beginTransaction();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->updated_at = now();
        if ($customer->save()) {
            $user->phone = $request->phone_number;
            $user->updated_at = now();
            if ($user->save()) {
                \DB::commit();
                session()->flash('success', 'Profile has been updated successfully');
            } else {
                \DB::rollBack();
                session()->flash('error', 'Error while updating the profile, Please try after sometime');
            }
        } else {
            \DB::rollBack();
            session()->flash('error', 'Error while updating the profile, Please try after sometime');
        }
    }

    public function render()
    {
        return view('livewire.profile-updater');
    }
}
