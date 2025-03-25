<?php

namespace App\Http\Livewire\Console\Videos;

use App\Video;
use App\Playlist;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    /**
     * public variable
     */
    public $videoId;
    public $title;
    public $playlist_id;
    public $content;
    public $embed_youtube;
    public $image;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $video = Video::find($id);

        if($video) {

            $this->videoId       = $video->id;
            $this->title         = $video->title;
            $this->playlist_id   = $video->playlist_id; 
            $this->embed_youtube = $video->embed_youtube;
            $this->content       = $video->content;

        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'title'         => 'required',
            'embed_youtube' => 'required|url',
            'content'       => 'required'
        ]);

        if($this->videoId) {

            $video = Video::find($this->videoId);

            if($video) {

                if($this->image == null) {

                    $video->update([
                        'title'         => $this->title,
                        'slug'          => Str::slug($this->title, '-'),
                        'playlist_id'   => $this->playlist_id,
                        'user_id'       => Auth::user()->id,
                        'embed_youtube' => $this->embed_youtube,
                        'content'       => $this->content,  
                    ]);

                } else {

                    $this->image->store('public/videos');

                    $video->update([
                        'title'         => $this->title,
                        'slug'          => Str::slug($this->title, '-'),
                        'playlist_id'   => $this->playlist_id,
                        'user_id'       => Auth::user()->id,
                        'embed_youtube' => $this->embed_youtube,
                        'content'       => $this->content,
                        'image'         => $this->image->hashName()
                    ]);

                }

                session()->flash('success', 'Data updated successfully.');
                return redirect()->route('console.videos.index');

            }

        }

    }

    public function render()
    {
        return view('livewire.console.videos.edit', [
            'playlists' => Playlist::latest()->get()
        ]);
    }
}
