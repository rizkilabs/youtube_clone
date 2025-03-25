<div class="mt-3">
    <div class="card border-0 rounded-lg shadow-sm">
        <div class="card-header">
            <i class="fab fa-youtube"></i> ADD VIDEO
        </div>
        <div class="card-body">
            <form wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-12">
                        @if($image)
                        <div class="text-center">
                            <img src="{{ $image->temporaryUrl() }}" alt="" style="height: 150px;width:150px;object-fit:cover"
                                class="img-thumbnail">
                            <p>PREVIEW</p>
                        </div>
                        @else
                        <div class="text-center">
                            <img src="{{ asset('images/image.png') }}" alt=""
                                style="height: 150px;width:150px;object-fit:cover" class="img-thumbnail">
                            <p>PREVIEW</p>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" id="image" class="form-control" wire:model="image">
                    @error('image')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>TITLE</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title"
                        placeholder="Enter Title Video">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" wire:ignore>
                            <label>PLAYLISTS (OPTIONAL)</label>
                            <select class="select2 form-control"
                                wire:model.lazy="playlist_id">
                                <option value="">-- select playlist --</option>
                                @foreach ($playlists as $playlist)
                                <option value="{{ $playlist->id }}">{{ $playlist->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>LINK EMBED YOUTUBE</label>
                            <input type="text" class="form-control @error('embed_youtube') is-invalid @enderror" wire:model.lazy="embed_youtube"
                                placeholder="Enter URL Embed Youtube">
                            @error('embed_youtube')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group" wire:ignore>
                    <label>CONTENT / DESCRIPTION</label>
                    <textarea class="from-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Enter Description Video" rows="4" wire:model.lazy="content">{{ $content }}</textarea>
                    @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark shadow">SAVE</button>
                <button type="reset" class="btn btn-warning shadow">RESET</button>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content').on('change', function(e){
        @this.set('content', e.editor.getData());
    });
</script>
<script>
    $(document).ready(function () {
        //playlist
        $('.select2').select2({
            theme: 'bootstrap4',
            width: 'style'
        });
        $('.select2').on('change', function (e) {
            @this.set('playlist_id', e.target.value);
        });
    });
</script>