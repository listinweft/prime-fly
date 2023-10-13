<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProfileForm extends Component
{
    public $name = 'Grace Kelly';
    public $designation = 'Certified Anesthesia Technologist';
    public $description = 'Id volutpat aliquet eget sollicitudin enim. Sed auctor viverra vehicula leo. Vulputate feugiat volutpat metus vitae laoreet sed felis. Ut metus amet lectus lectus habitant purus ipsum';
    public $email = 'gracek@gmail.com';
    public $tel = '234-66-435';

    public function render()
    {
        return view('livewire.profile-form');
    }

   
}
