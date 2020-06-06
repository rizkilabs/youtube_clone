<div>
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center">
                  <a href="{{ url('/') }}">
                    <img src="{{ asset('images/new-youtube-logo.svg') }}" style="width: 200px">
                  </a>
                </div>
                <div class="card border-0 shadow-sm rounded-lg mt-5">
                    <div class="card-body">
                        <form wire:submit.prevent="login">
                            <div class="form-group">
                              <label>Email address</label>
                              <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email">
                              @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                              @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                              @enderror
                            </div>
                            <button type="submit" class="btn btn-primary shadow">LOGIN</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
