<div style="margin-bottom: 50px">

    <div class="container-fluid" style="margin-top: 80px">

        <div class="row mb-3">
            <div class="col-md-12">
                <a href="" class="badge badge-secondary bg-light text-dark shadow-sm mb-2"
                    style="font-size: 18px;border-radius:16px">All Playlist</a>
                @foreach ($playlists as $playlist)
                <a href="{{ route('frontend.playlists.show', $playlist->slug) }}" class="badge badge-secondary shadow-sm mb-2"
                    style="font-size: 18px;border-radius:16px">{{ $playlist->title }}</a>
                @endforeach
            </div>
        </div>

        <div class="row">

            @foreach ($videos as $video)

            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 rounded shadow-sm">
                    <div class="card-img">
                        <a href="{{ route('frontend.videos.show', $video->slug) }}">
                            <img src="{{ Storage::url('public/videos/'.$video->image) }}" class="w-100 rounded"
                            style="border-bottom-left-radius:0px!important;border-bottom-right-radius:0px!important;height:150px;object-fit:cover">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <img src="{{ Storage::url('public/avatar/'.$video->user->image) }}" class="rounded-circle" width="40">
                            </div>
                            <div class="col-12 col-md-10">
                                <a href="{{ route('frontend.videos.show', $video->slug) }}" class="font-weight-bold text-dark text-decoration-none">
                                    {{ $video->title }}
                                </a>
                                <p class="mt-3">
                                    {{ $video->user->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" style="background-color: rgb(255, 255, 255);border:none">
                        <strong>{{ $video->views }}</strong> views • {{ $video->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="row justify-content-center mt-5">
            @if($videos->hasMorePages())
            <button wire:click="loadMore()" class="btn btn-dark btn-lg shadow-md">Load More</button>
            @endif
        </div>

    </div>
