<div class="mt-3">
    <div class="card border-0 rounded-lg shadow-sm">
        <div class="card-header">
            <i class="fas fa-users"></i> EDIT USER
        </div>
        <div class="card-body">
            <form wire:submit.prevent="update">
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
                    
                </div>
                <input type="hidden" wire:model="userId">
                <div class="form-group">
                    <label>FULL NAME</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.lazy="name"
                        placeholder="Enter Full Name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>EMAIL ADDRESS</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.lazy="email"
                        placeholder="Enter Email Address">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>PASSWORD</label>
                    <input type="password" class="form-control" wire:model.lazy="password"
                        placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-dark shadow">UPDATE</button>
                <button type="reset" class="btn btn-warning shadow">RESET</button>
            </form>
        </div>
    </div>
</div>
