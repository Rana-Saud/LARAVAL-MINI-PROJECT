    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">User Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <form class="d-flex" role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search" value="{{ request('search') }}">
                    <a href="{{ url('user/create') }}" class="btn btn-outline-primary w-100 mx-2" type="submit">Add
                        User</a>
                </form>
                <div class="dropdown text-end">
                    <a href="javascript:void(0)" class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-light"
                        data-bs-toggle="dropdown" aria-expanded="true">
                        <img src="{{ isset(Auth::user()->image) ? asset('images/'.Auth::user()->image) : asset('images/img-placeholder.jfif') }}" alt="mdo" width="32" height="32"
                            class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" data-popper-placement="bottom-start"
                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(-70%, 45px, 0px);">
                        <li><a class="dropdown-item" href="{{ url('user/details') }}">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('logout') }}">Log out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
