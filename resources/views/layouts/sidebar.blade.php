<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/" class="text-nowrap logo-img">
            <img src="{{ asset('/asset/image/logo.jpeg') }}"
                style="padding-top: 10px; width: 40px; height: 50px; vertical-align: middle;" alt="Logo" />
            <span class="text-warning font-weight-bold text-bold"
                style="vertical-align: middle; margin-left: 10px; font-size: 30px;"><strong>Kontraktor</strong></span>

        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
        </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/" aria-expanded="false">
                    <span>
                        <i class="ti ti-layout-dashboard"></i>
                    </span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->status == 'kontraktor')
            <li class="sidebar-item">
                <a class="sidebar-link" href="/kontraktor" aria-expanded="false">
                    <span>
                        <i class="ti ti-user-circle"></i>
                    </span>
                    <span class="hide-menu">Data Kontraktor</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->status == 'client')
            <li class="sidebar-item">
                <a class="sidebar-link" href="/client" aria-expanded="false">
                    <span>
                        <i class="ti ti-user-circle"></i>
                    </span>
                    <span class="hide-menu">Data Klien</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->status == 'kontraktor')
            <li class="sidebar-item">
                <a class="sidebar-link" href="/jasa" aria-expanded="false">
                    <span>
                        <i class="ti ti-package"></i>
                    </span>
                    <span class="hide-menu">Jual Jasa</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->status == 'kontraktor')
            <li class="sidebar-item">
                <a class="sidebar-link" href="/data-client" aria-expanded="false">
                    <span>
                        <i class="ti ti-users"></i>
                    </span>
                    <span class="hide-menu">Data Client</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->status == 'client')
            <li class="sidebar-item">
                <a class="sidebar-link" href="/data-sewa" aria-expanded="false">
                    <span>
                        <i class="ti ti-cards"></i>
                    </span>
                    <span class="hide-menu">Data Sewa</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="/sewakontraktor" aria-expanded="false">
                    <span>
                        <i class="ti ti-package"></i>
                    </span>
                    <span class="hide-menu">Sewa Kontraktor</span>
                </a>
            </li>
            @endif
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="index.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-history"></i>
                    </span>
                    <span class="hide-menu">Riwayat</span>
                </a>
            </li> --}}
            <li class="sidebar-item">
                <a class="sidebar-link" href="/chat" aria-expanded="false">
                    <span>
                        <i class="ti ti-message-dots"></i>
                    </span>
                    <span class="hide-menu">Chat</span>
                </a>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-typography"></i>
                    </span>
                    <span class="hide-menu">Typography</span>
                </a>
            </li> --}}
            {{-- <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">AUTH</span>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./authentication-login.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-login"></i>
                    </span>
                    <span class="hide-menu">Login</span>
                </a>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./authentication-register.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-user-plus"></i>
                    </span>
                    <span class="hide-menu">Register</span>
                </a>
            </li> --}}
            {{-- <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">EXTRA</span>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./icon-tabler.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-mood-happy"></i>
                    </span>
                    <span class="hide-menu">Icons</span>
                </a>
            </li> --}}
            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                    <span>
                        <i class="ti ti-aperture"></i>
                    </span>
                    <span class="hide-menu">Sample Page</span>
                </a>
            </li> --}}
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>