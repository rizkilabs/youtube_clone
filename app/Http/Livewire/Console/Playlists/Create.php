<?php

namespace App\Http\Livewire\Console\Playlists;

use App\Playlist;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{

    /**
     * public variable
     */
    public $title;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'title' => 'required'
        ]);

        $playlist = Playlist::create([
            'title' => $this->title,
            'slug'  => Str::slug($this->title, '-')
        ]);

        if($playlist) {

            session()->flash('success', 'Data saved successfully.');
            return redirect()->route('console.playlists.index');

        } else {

            session()->flash('error', 'Data failed to save.');
            return redirect()->route('console.playlists.index');

        }

    }

    public function render()
    {
        return view('livewire.console.playlists.create');
    }
}
