<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{

    use WithFileUploads;

    /**
     * public variable
     */
    public $userId;
    public $name;
    public $email;
    public $password;
    public $image;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $user = User::find($id);

        if($user) {

            $this->userId   = $user->id;
            $this->name     = $user->name;
            $this->email    = $user->email; 

        }

    }

    /**
     * store function
     */
    public function update()
    {
        $this->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email,'.$this->userId
        ]);

        if($this->userId) {

            $user = User::find($this->userId);
    
            if($user) {

                if($this->password == "") {

                    if($this->image == null) {
                    
                        $user->update([
                            'name'      => $this->name,
                            'email'     => $this->email
                        ]);

                    } else {

                        $this->image->store('public/avatar');

                        $user->update([
                            'name'      => $this->name,
                            'email'     => $this->email,
                            'image'     => $this->image->hashName()
                        ]);

                    }

                } else {

                    if($this->image == null) {
                    
                        $user->update([
                            'name'      => $this->name,
                            'email'     => $this->email,
                            'password'  => bcrypt($this->password)
                        ]);
                    
                    } else {

                        $this->image->store('public/avatar');

                        $user->update([
                            'name'      => $this->name,
                            'email'     => $this->email,
                            'password'  => bcrypt($this->password),
                            'image'     => $this->image->hashName()
                        ]);

                    }
                }

                session()->flash('success', 'Data updated successfully.');
                return redirect()->route('console.users.index');
    
            } 

        }

    }

    public function render()
    {
        return view('livewire.console.users.edit');
    }
}
