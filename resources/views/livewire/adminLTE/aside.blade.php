<div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8"> --}}
            <h4 class="brand-text font-weight-light">{{ config('app.name') }}</h4>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->fullname }}</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <?php $role = Auth::user()->roles; ?>
                        <a href="@if ($role == 1)
                                    {{ '/admin/dashboard' }}
                                @elseif($role == 2)
                                    {{ route('hubin.dashboard') }}
                                @elseif($role == 3)
                                    {{ '/dashboard' }}    
                                @endif" class="nav-link {{ request()->is('hubin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p class="ml-2">
                                Dashboard
                                {{--  <span class="right badge badge-danger">New</span>  --}}
                            </p>
                        </a>
                    </li>


                    {{--  ROLE HUBIN  --}}
                    @if ($role === 2)
                        <li class="nav-item has-treeview mt-2 {{ request()->is('hubin/siswa') ? 'menu-open' : '' }}"> {{-- <i class="right fas fa-angle-left"></i> --}}
                            <a href="#" class="nav-link {{ request()->is('hubin/siswa') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Data Master
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('hubin.index.siswa') }}" class="nav-link {{ request()->is('hubin/siswa') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Siswa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Perusahaan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{--  ROLE HUBIN  --}}
                    @endif

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Simple Link
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

</div>
