<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Console</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <livewire:styles/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <livewire:scripts/>
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light" id="sidebar-wrapper">
          <div class="sidebar-heading bg-dark text-white"><i class="fab fa-youtube"></i> CONSOLE </div>
          <div class="list-group list-group-flush">
            <a href="{{ route('console.dashboard.index') }}" class="list-group-item list-group-item-action {{ setActive('console/dashboard') }}"><i class="fa fa-tachometer-alt" aria-hidden="true"></i> DASHBOARD</a>
            <a href="{{ route('console.playlists.index') }}" class="list-group-item list-group-item-action {{ setActive('console/playlists') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> PLAYLIST</a>
            <a href="{{ route('console.videos.index') }}" class="list-group-item list-group-item-action {{ setActive('console/videos') }}"><i class="fab fa-youtube" aria-hidden="true"></i> VIDEOS</a>
            <a href="{{ route('console.users.index') }}" class="list-group-item list-group-item-action {{ setActive('console/users') }}"><i class="fa fa-users" aria-hidden="true"></i> USERS</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-cog" aria-hidden="true"></i> SETINGS</a>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->
    
        <!-- Page Content -->
        <div id="page-content-wrapper">
    
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
            <button class="btn btn-light shadow" id="menu-toggle"><i class="fa fa-list-ul" aria-hidden="true"></i></button>
    
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }}
                  </a>
                  <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('/') }}" target="_blank"><i class="fa fa-external-link-alt" aria-hidden="true"></i> View Website</a>
                    <div class="dropdown-divider"></div>
                    <livewire:auth.logout/>
                  </div>
              </ul>
            </div>
          </nav>
    
          <div class="container-fluid" style="margin-bottom: 50px">
            @yield('content')
          </div>
        </div>
        <!-- /#page-content-wrapper -->
    
      </div>
      <!-- /#wrapper -->
    
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
      <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>