<div style="margin-bottom: 50px">
    <div class="container-fluid" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8">
                <iframe width="100%" height="450" src="{{ $video_play->embed_youtube }}?autoplay=1" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="card border-0 rounded shadow-sm mb-3">
                    <div class="card-body">
                        <h3 class="font-weight-bold">{{ $video_play->title }}</h3>
                        <p>
                            {{ $video_play->views }} views • {{ $video_play->created_at->diffForHumans() }}
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-2 col-md-1">
                                <img src="{{ Storage::url('public/avatar/'.$video_play->user->image) }}" class="rounded-circle" width="60">
                            </div>
                            <div class="col-10 col-md-11">
                                <p class="mt-3">
                                    <strong>{{ $video_play->user->name }}</strong>
                                </p>
                                <p style="margin-top: -20px">
                                    <strong>{{ App\Video::where('user_id', $video_play->user->id)->count() }}</strong> videos
                                </p>
                                <p class="mt-4">
                                    {!! $video_play->content !!}
                                </p>
                            </div>
                        </div>
                        <hr>
                        @include('layouts.comments')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 rounded shadow-sm mb-3">
                    <div class="card-header">
                        <h5>
                            <i class="fa fa-list-ul" aria-hidden="true"></i> {{ $playlist->title }}
                        </h5> 
                    </div>
                    <div class="card-body" style="overflow: hidden; height: 380px;overflow-y: scroll;padding-bottom:10px">

                        @foreach ($videos as $video)
                        <a href="{{ route('frontend.playlists.show', $segment.'?id='.$video->id) }}" class="text-dark text-decoration-none">
                            <div class="media">
                                <img class="align-self-center mr-2" src="{{ Storage::url('public/videos/'.$video->image) }}" width="120">
                                <div class="media-body">
                                    <h6 class="mt-0 font-weight-bold">{{ $video->title }}</h6>
                                </div>
                            </div>
                        </a>
                        <hr>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
