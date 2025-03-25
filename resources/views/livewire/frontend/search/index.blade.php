<div style="margin-bottom: 50px">

    <div class="container-fluid" style="margin-top: 80px">

        <div class="row">
            
            @foreach ($videos as $video)
            
                <div class="col-md-9">
                    <div class="card border-0 rounded shadow-sm mb-3">
                        <a href="{{ route('frontend.videos.show', $video->slug) }}" class="text-dark text-decoration-none">
                            <div class="media">
                                <img class="align-self-center mr-2" src="{{ Storage::url('public/videos/'.$video->image) }}" width="200">
                                <div class="media-body">
                                    <h6 class="mt-0 font-weight-bold">{{ $video->title }}</h6>
                                    <p class="mb-0">{{ $video->user->name }} </p>
                                    <p>
                                       <strong>{{ $video->views }}</strong> views • {{ $video->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            @endforeach

        </div>

        <div class="row">
            <div class="col-md-9">
                {{ $videos->links() }}
            </div>
        </div>

    </div>

</div>
