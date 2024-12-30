<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        {{--
        <div class="search-element">
            <input class="form-control" type="" placeholder="Search" aria-label="" data-width="250" readonly>
            <button class="btn" type="hidden"><i class="fas fa-search" aria-readonly=""></i></button>


        </div> --}}
        <div class="search-element">
            <input class="form-control" type="text" placeholder="Search" aria-label="" data-width="250" readonly>
            <button class="btn" type="submit" hidden><i class="fas fa-search" aria-readonly=""></i></button>
        </div>

    </form>
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> {{ auth()->user()->user }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="/logout" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>
        {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> --}}
    </ul>
</nav>
