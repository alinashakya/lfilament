<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\UsernamePassword;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * @property \Filament\Forms\Form $form
 */
class CreateProgramAccount extends Component implements HasForms
{
    use InteractsWithForms;

    public array $data;

    public function mount()
    {
        $this->form->fill();
    }

    public function create()
    {
        $this->validate();

        $username = $this->data['username'];
        $password = $this->data['password'];

        $checkCredentials = UsernamePassword::query()
            ->where('username', $username)
            ->where('password', $password)
            ->exists();

        if ($username && $password && !$checkCredentials) {
            throw new \Exception("Invalid username/password");
        }

        $programAccounts = new \App\Models\ProgramAccount();
        $programAccounts->program_account_name = $this->data['program_account_name'];
        $programAccounts->program_account_status = $this->data['program_account_status'];
        $programAccounts->user_id = Auth::user()->id;

        if ($checkCredentials) {
            $programAccounts->verification_status = 'verified';
            $programAccounts->username = $username;
            $programAccounts->password = $password;
        }

        $programAccounts->save();

        $this->redirect('/program-account', navigate: true);

    }

    public function form(Form $form): Form
    {
        return $form->schema(\App\Models\ProgramAccount::form())
            ->model(\App\Models\ProgramAccount::class)
            ->statePath('data');
    }

    public function render()
    {
        return view('livewire.programs.create', [
            'title' => 'Add Site'
        ]);
    }
}
