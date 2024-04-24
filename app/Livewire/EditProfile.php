<?php

namespace App\Livewire;

use App\Livewire\Forms\ProfileForm;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditProfile extends Component
{
    public ProfileForm $form;
    public $showSuccess = false;

    public function mount()
    {
        //$this->user = auth()->user();
        $this->form->setUser(User::find(1));
    }

    public function save()
    {
        $this->form->update();
        sleep(1);

        $this->showSuccess = true;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}
