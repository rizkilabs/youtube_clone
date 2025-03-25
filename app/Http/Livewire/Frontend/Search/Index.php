<?php

namespace App\Http\Livewire\Frontend\Search;

use App\Video;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * public variable
     */
    public $search;

    /**
     * mount or construct function
     */
    public function mount(Request $request)
    {
        $this->search = $request->get('q');

        if($this->search == "") {

            return redirect()->route('root');

        }

    }

    public function render()
    {
        $videos = Video::where('title', 'like', '%' .$this->search. '%')->latest()->paginate(5);

        return view('livewire.frontend.search.index', [
            'videos' => $videos
        ]);
    }
}
