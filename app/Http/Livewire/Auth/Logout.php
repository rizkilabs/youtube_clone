<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        Auth::logout();
        
        session()->flash('success', 'Logout successfully.');
        return redirect()->route('auth.login');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
