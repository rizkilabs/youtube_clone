<div style="margin-bottom: 50px">
    <div class="container-fluid" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8">
                <iframe width="100%" height="450" src="{{ $embed_youtube }}?autoplay=1" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="card border-0 rounded shadow-sm mb-3">
                    <div class="card-body">
                        <h3 class="font-weight-bold">{{ $title }}</h3>
                        <p>
                            {{ $views }} views • {{ $created_at }}
                        </p>
                        <hr>
                        <div class="row">
                            <div class="col-2 col-md-1">
                                <img src="{{ Storage::url('public/avatar/'.$user->image) }}" class="rounded-circle" width="60">
                            </div>
                            <div class="col-10 col-md-11">
                                <p class="mt-3">
                                  <strong>{{ $user->name }}</strong>  
                                </p>
                                <p style="margin-top: -20px">
                                    <strong>{{ App\Video::where('user_id', $user_id)->count() }}</strong> videos
                                </p>
                                <p class="mt-4">
                                    {!! $content !!}
                                </p>
                            </div>
                        </div>
                        <hr>
                        @include('layouts.comments')
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @foreach ($videos as $video)
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
                @endforeach
            </div>
        </div>
    </div>
</div>
