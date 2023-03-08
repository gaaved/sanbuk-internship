<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class SignUp extends Component
{
    public string|null $first_name = null;
    public string|null $last_name = null;
    public string|null $phone = null;
    public string|null $email = null;
    public bool $isButtonDisabled = true;

    protected $rules = [
        'first_name' => 'required|min:2',
        'last_name' => 'required|min:2',
        'phone' => 'required|min:6',
        'email' => 'email|nullable',
    ];

    public function updated($name, $value)
    {
        if (strlen($value) <= 0) {
            $this->$name = null;
        }

        if (
            $this->first_name !== null
            && $this->last_name !== null
            && $this->phone !== null
        ) {
            $this->isButtonDisabled = false;
        } else {
            $this->isButtonDisabled = true;
        }
    }

    public function render()
    {
        return view('livewire.users.sign-up');
    }

    public function submit()
    {
        $this->validate();
    }
}
