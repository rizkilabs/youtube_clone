<?php

namespace App\Http\Livewire\Frontend\Home;

use App\Playlist;
use App\Video;
use Livewire\Component;

class Index extends Component
{
    /**
     * public variable
     */
    public $perPage  = 8;

    /**
     * load more function
     */
    public function loadMore()
    {
        $this->perPage = $this->perPage + 4;
    }

    public function render()
    {
        $videos = Video::latest()->paginate($this->perPage);

        return view('livewire.frontend.home.index', [
            'playlists' => Playlist::latest()->get(),
            'videos'    => $videos
        ]);
    }
}
