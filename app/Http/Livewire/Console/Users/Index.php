<?php

namespace App\Http\Livewire\Console\Users;

use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * public variable
     */
    public $search;

    protected $updatesQueryString = ['search'];

    /**
     * destroy function
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user) {

            $user->delete();
            session()->flash('success', 'Data deleted successfully.');
            return redirect()->route('console.users.index');

        } else {

            session()->flash('error', 'Data failed to delete.');
            return redirect()->route('console.users.index');

        }

    }

    public function render()
    {
        if($this->search != null) {

            $users = User::where('name', 'like', '%' .$this->search. '%')->latest()->paginate(10);

        } else {

            $users = User::latest()->paginate(10);

        }

        return view('livewire.console.users.index', [
            'users' => $users
        ]);
    }
}
