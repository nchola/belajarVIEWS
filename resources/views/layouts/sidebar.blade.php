<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                @if (request()->user()->role == 'Admin')
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-gauge"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
                            href="{{ route('users.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-account"></i>
                            <span class="hide-menu">Pengguna</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('rangking.index') ? 'active' : '' }}"
                            href="{{ route('rangking.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-chart-bar"></i>
                            <span class="hide-menu">Rangking</span>
                        </a>
                    </li>
                @elseif(request()->user()->role == 'Kepala Marketing')
                    {{-- <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-gauge"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('pelanggan.index') ? 'active' : '' }}"
                            href="{{ route('pelanggan.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-account"></i>
                            <span class="hide-menu">Pelanggan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('kriteria.index') ? 'active' : '' }}"
                            href="{{ route('kriteria.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-tag"></i>
                            <span class="hide-menu">Kriteria</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('penilaian.index') ? 'active' : '' }}"
                            href="{{ route('penilaian.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-clipboard-check"></i>
                            <span class="hide-menu">Penilaian</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('rangking.index') ? 'active' : '' }}"
                            href="{{ route('rangking.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-chart-bar"></i>
                            <span class="hide-menu">Rangking</span>
                        </a>
                    </li>
                @elseif(request()->user()->role == 'Divisi Marketing')
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ request()->routeIs('rangking.index') ? 'active' : '' }}"
                            href="{{ route('rangking.index') }}" aria-expanded="false">
                            <i class="mdi me-2 mdi-chart-bar"></i>
                            <span class="hide-menu">Rangking</span>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <div class="sidebar-footer">
        <div class="row">
            <div class="col-12 link-wrap">
                <!-- item-->
                <a href="{{ route('logout') }}" class="link" style='font-weight: bold;' data-toggle="tooltip"
                    title="" data-original-title="Settings">
                    <i class="ti-angle-left" style="font-weight: bold"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
</aside>
