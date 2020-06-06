<?php

namespace App\Http\Livewire\Frontend\Videos;

use App\Video;
use Livewire\Component;

class Show extends Component
{
    /**
     * public variable
     */
    public $title;
    public $slug;
    public $image;
    public $embed_youtube;
    public $content;
    public $playlist;
    public $user;
    public $user_id;
    public $views;
    public $created_at;

    /**
     * mount or construct function
     */
    public function mount($slug)
    {
        $video = Video::where('slug', $slug)->first();

        if($video) {

            $this->title            = $video->title;
            $this->slug             = $video->slug;
            $this->image            = $video->image;
            $this->embed_youtube    = $video->embed_youtube;
            $this->content          = $video->content;
            $this->playlist         = $video->playlist;
            $this->user             = $video->user;
            $this->user_id          = $video->user_id;   
            $this->views            = $video->views;  
            $this->created_at       = $video->created_at->diffForHumans();
            
            $video->update([
                'views' => $video->views + 1
            ]);

        } else {

            return redirect()->route('root');

        }

    }

    public function render()
    {
        return view('livewire.frontend.videos.show', [
            'videos' => Video::latest()->take(5)->get()
        ]);
    }
}
