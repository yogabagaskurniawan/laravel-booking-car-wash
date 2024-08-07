<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Login extends Component
{
    use LivewireAlert;
    public $email;
    public $password;
    protected $rules = [
        'email'     => 'required',
        'password'  => 'required',
    ];
    public function proccesslogin()
    {
        $this->validate();

        $credentials = array(
            'email' =>  $this->email,
            'password' =>  $this->password
        );

        if (auth()->attempt($credentials)) {
            session()->regenerate();
            $this->flash('success', 'Login Berhasil');
            return redirect()->to('/admin/dashboard');
        }

        $this->reset();
        $this->alert('error', 'Email atau Password salah');
        return back();
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
