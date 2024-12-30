<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-header bg-blue">
            <!-- Add header content here if needed -->
        </div>
        <div class="sidebar-brand">
            <a href="#">
                <img src="../assets/img/avatar/tch1.jpg" class="rounded" width="150" alt="Logo">
            </a>
        </div>
        <br>
        <br>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">
                <img src="../assets/img/avatar/tch1.jpg" class="rounded img-fluid" width="60" alt="Logo">
            </a>
        </div>

        <br>

        <ul class="sidebar-menu">

            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i class="fas fa-globe red-icon fa-lg"></i>
                    <span>MASTER DATA</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/index_image" class="nav-link">
                            <span>MASTER DATA IMAGE</span>
                        </a></li>
                    <li><a href="/index_pic" class="nav-link">
                            <span>MASTER DATA PIC</span>
                        </a></li>
                    <li><a href="/index_master_data" class="nav-link">
                            <span>MASTER DATA MESIN</span>
                        </a></li>
                    <li><a href="/Kategori" class="nav-link">
                            <span>MASTER DATA KATEGORI</span>
                        </a></li>
                    <li><a href="/master_desc" class="nav-link">
                            <span>MASTER DATA DESC</span>
                        </a></li>
                    <li><a href="/master_point" class="nav-link">
                            <span>MASTER DATA POINT</span>
                        </a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="indexdaily" class="nav-link">
                    <i class="fa-solid fa-file red-icon"></i>
                    <span class="brand-text text-dark font-weight-light">REPORT</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="daily_check" class="nav-link">
                    <i class="fa-solid fa-check-to-slot red-icon"></i>
                    <span class="brand-text text-dark font-weight-light">CHECK POINT MESIN</span>
                </a>
            </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="/" class="btn btn-secondary btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> DASHBOARD
                </a>
            </div> --}}
            @if (auth()->check())
                @if (auth()->user()->group == 'User Admin')
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown">
                            <i class="fas fa-globe red-icon fa-lg"></i>
                            <span>MASTER DATA</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/index_image" class="nav-link">
                                    <span>MASTER DATA IMAGE</span>
                                </a></li>
                            <li><a href="/index_pic" class="nav-link">
                                    <span>MASTER DATA PIC</span>
                                </a></li>
                            <li><a href="/index_master_data" class="nav-link">
                                    <span>MASTER DATA MESIN</span>
                                </a></li>
                            <li><a href="/Kategori" class="nav-link">
                                    <span>MASTER DATA KATEGORI</span>
                                </a></li>
                            <li><a href="/master_desc" class="nav-link">
                                    <span>MASTER DATA DESC</span>
                                </a></li>
                            <li><a href="/master_point" class="nav-link">
                                    <span>MASTER DATA POINT</span>
                                </a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="indexdaily" class="nav-link">
                            <i class="fa-solid fa-file red-icon"></i>
                            <span class="brand-text text-dark font-weight-light">REPORT</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="daily_check" class="nav-link">
                            <i class="fa-solid fa-check-to-slot red-icon"></i>
                            <span class="brand-text text-dark font-weight-light">CHECK POINT MESIN</span>
                        </a>
                    </li>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="/" class="btn btn-secondary btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> DASHBOARD
                        </a>
                    </div>
                @else
                    <br>
                    <!-- Tampilkan hanya menu CHECK POINT MESIN -->
                    <li class="nav-item">
                        <a href="daily_check" class="nav-link">
                            <i class="fa-solid fa-check-to-slot red-icon"></i>
                            <span class="brand-text text-dark font-weight-light">CHECK POINT MESIN</span>
                        </a>
                    </li>
                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="/" class="btn btn-secondary btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> DASHBOARD
                        </a>
                    </div>
                @endif
            @endif

        </ul>
    </aside>
</div>
