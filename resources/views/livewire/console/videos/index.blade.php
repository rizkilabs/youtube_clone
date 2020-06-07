<div  class="mt-3">
    <div class="card border-0 rounded-lg shadow-sm">
        <div class="card-header">
           <i class="fab fa-youtube"></i> VIDEOS
        </div>
        <div class="card-body">
            <div class="input-group">
                <div class="input-group-append">
                    <a href="{{ route('console.videos.create') }}" class="btn btn-dark"><i
                            class="fa fa-plus-circle"></i>
                        ADD
                    </a>
                </div>
                <input type="text" wire:model="search" placeholder="cari sesuatu disini..." class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> SEARCH
                    </button>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">VIDEO</th>
                        <th scope="col">OPTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($videos as $no => $video)
                        <tr>
                            <th class="text-center" scope="row">{{ ++$no + ($videos->currentPage()-1) * $videos->perPage() }}</th>
                            <td>{{ $video->title }}</td>
                            <td class="text-center">
                                <iframe width="300" height="150" src="{{ $video->embed_youtube }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </td>
                            <td class="text-center" style="width:20%">
                                <a href="{{ route('console.videos.edit', $video->id) }}" class="btn btn-primary btn-sm shadow">EDIT</a>
                                <button wire:click="destroy({{ $video->id }})" class="btn btn-danger btn-sm shadow">DELETE</button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $videos->links() }}
            </div>
        </div>
    </div>
</div>
