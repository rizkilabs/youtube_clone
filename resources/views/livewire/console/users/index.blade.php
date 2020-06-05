<div  class="mt-3">
    <div class="card border-0 rounded-lg shadow-sm">
        <div class="card-header">
           <i class="fas fa-users"></i> USERS
        </div>
        <div class="card-body">
            <div class="input-group">
                <div class="input-group-append">
                    <a href="{{ route('console.users.create') }}" class="btn btn-dark"><i
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
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">OPTIONS</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $no => $user)
                        <tr>
                            <th class="text-center" scope="row">{{ ++$no + ($users->currentPage()-1) * $users->perPage() }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('console.users.edit', $user->id) }}" class="btn btn-primary btn-sm shadow">EDIT</a>
                                <button wire:click="destroy({{ $user->id }})" class="btn btn-danger btn-sm shadow">DELETE</button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
