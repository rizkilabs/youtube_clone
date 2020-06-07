<?php

namespace App\Http\Livewire\Frontend\Playlists;

use App\Playlist;
use App\Video;
use Livewire\Component;
use Illuminate\Http\Request;

class Show extends Component
{
    /**
     * public variable
     */
    public $segment;
    public $videoId;

    /**
     * mount or construct function
     */
    public function mount(Request $request)
    {
        $this->segment = $request->segment(2);
        $this->videoId = $request->get('id'); 
    }

    public function render()
    {

        $playlist = Playlist::where('slug', $this->segment)->first();

        if($playlist) {

            if($this->videoId == "") {

                $video_play = Video::where('playlist_id', $playlist->id)
                ->orderBy('id', 'ASC')
                ->first();

                $video_play->update([
                    'views' => $video_play->views + 1
                ]);

            } else {

                $video_play = Video::where('id', $this->videoId)
                ->where('playlist_id', $playlist->id)
                ->first();

                $video_play->update([
                    'views' => $video_play->views + 1
                ]);
                
            }

            $videos = Video::where('playlist_id', $playlist->id)->get();

        } 
        return view('livewire.frontend.playlists.show', [
            'video_play'    => $video_play,
            'playlist'      => $playlist,
            'videos'        => $videos
        ]);
    }
}
