<?php

namespace App\Http\Livewire\Console\Videos;

use App\Video;
use App\Playlist;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    /**
     * public variable
     */
    public $title;
    public $playlist_id;
    public $content;
    public $embed_youtube;
    public $image;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'image'         => 'required|image',
            'title'         => 'required',
            'embed_youtube' => 'required|url',
            'content'       => 'required'
        ]);

        $this->image->store('public/videos');

        $video = Video::create([
            'title'         => $this->title,
            'slug'          => Str::slug($this->title, '-'),
            'playlist_id'   => $this->playlist_id,
            'user_id'       => Auth::user()->id,
            'embed_youtube' => $this->embed_youtube,
            'content'       => $this->content,
            'image'         => $this->image->hashName(),
            'views'         => 0
        ]);

        if($video) {

            session()->flash('success', 'Data saved successfully.');
            return redirect()->route('console.videos.index');

        } else {

            session()->flash('error', 'Data failed to save.');
            return redirect()->route('console.videos.index');

        }

    }

    public function render()
    {
        return view('livewire.console.videos.create', [
            'playlists' => Playlist::latest()->get()
        ]);
    }
}
