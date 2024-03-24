<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item{{ Request::is('home') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item{{ Request::is('user') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('user') }}">User</a>
                </li>
                <li class="nav-item{{ Request::is('student') ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('student') }}">Student</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Report</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-transparent dropdown-toggle text-white" type="button" data-toggle="dropdown"
                    aria-expanded="false">
                    {{ Auth::user()->name ?? 'User' }}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Setting</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
