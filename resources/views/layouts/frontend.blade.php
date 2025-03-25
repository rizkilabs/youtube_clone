<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - YouTube</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <livewire:styles/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <livewire:scripts/>
    <script src="{{ mix('js/app.js') }}"></script>
</head>
<body>

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark text-white mb-5"
        style="background-color: #171d26!important;">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-new.png') }}" width="100" class="d-inline-block align-top" alt="" loading="lazy">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-sk">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar-sk">
            
            <div class="mx-2 my-auto d-inline" style="width: 60%">
                <form action="{{ route('frontend.search.index') }}">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control border-0 rounded-0 border-right-0" placeholder="Search...">
                        <span class="input-group-append">
                            <button class="btn text-white shadow border rounded-0 border-left-0" type="submit" style="padding-left: 30px;padding-right: 30px;">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>

            <ul class="nav navbar-nav navbar-right ml-auto">
                

                @if (Auth::guard()->check())
                <ul class="navbar-nav d-none d-md-block ml-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('console.dashboard.index') }}"><i
                                    class="fa fa-tachometer-alt"></i> Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <livewire:auth.logout/>
                        </div>
                </ul>
                @else
                <li class="nav-item">
                    <a href="{{ route('auth.login') }}" class="btn btn-md shadow btn-primary btn-block"><i
                            class="fa fa-user-circle"></i> SIGN IN</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')
    
    <script>
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}')
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}')
        @endif
    </script>
</body>
</html>