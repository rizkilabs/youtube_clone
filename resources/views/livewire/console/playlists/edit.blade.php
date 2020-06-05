<div class="mt-3">
    <div class="card border-0 rounded-lg shadow-sm">
        <div class="card-header">
            <i class="fas fa-list-ul"></i> EDIT PLAYLIST
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="playlistId">
                <div class="form-group">
                    <label>TITLE</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model.lazy="title"
                        placeholder="Enter Playlist Name">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-dark shadow">UPDATE</button>
                <button type="reset" class="btn btn-warning shadow">RESET</button>
            </form>
        </div>
    </div>
</div>
