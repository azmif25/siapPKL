<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">

  <!-- Brand Logo -->
  {{-- <a href="index3.html" class="brand-link">
    {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
    {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
  {{-- </a> --}}

  <!-- Sidebar -->
  <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
    <!-- Sidebar user panel (optional) -->


    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{URL::to('admin/profile')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              @if (Auth::user()->role->rolename == 'EndUser')
                <strong>{{ Auth::user()->pesertadata['nama_peserta'] }}</strong>
                @else
                <strong>{{ Auth::user()->pegawai['nama_pegawai'] }}</strong>
              @endif

            </p>
          </a>
        </li>
      </ul>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      {{-- <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div> --}}
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{URL::to('admin/dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                  Dashboard
            </p>
          </a>
        </li>

      @if ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['status'] == 'aktif') && (Auth::user()->pesertadata['status_penerimaan'] == 'Diterima'))
        <li class="nav-item">
          <a href="{{URL::to('admin/absensi')}}" class="nav-link">
            <i class="nav-icon fas fa-clock"></i>
            <p>
                Absensi
            </p>
          </a>
        </li>
      <li class="nav-item">
        <a href="{{URL::to('admin/upload')}}" class="nav-link">
          <i class="nav-icon fas fa-upload"></i>
          <p>
            Upload Hasil PKL
          </p>
        </a>
      </li>
      @endif

      @if (Auth::user()->role->rolename != 'EndUser')
        <li class="nav-item">
          <a href="{{URL::to('admin/laporan')}}" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
                Laporan Absensi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('admin/hasil')}}" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Daftar  Hasil PKL
            </p>
          </a>
        </li>
          <li class="nav-item">
            <a href="{{URL::to('admin/peserta')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                  Daftar Peserta PKL
              </p>
            </a>
          </li>
        @endif


      @if (Auth::user()->role->rolename == 'SuperAdmin')
        <li class="nav-item">
          <a href="{{URL::to('admin/pengguna')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Daftar Pengguna
            </p>
          </a>
        </li>
      @endif

      @if (Auth::user()->role->rolename != 'SuperAdmin')
          <li class="nav-item">
            <a href="{{URL::to('admin/Hadmin')}}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                  Admin
              </p>
            </a>
          </li>
      @endif

      <li class="nav-item">
        <a href="{{ url('logout') }}" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Logout
          </p>
        </a>
        {{-- <a href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a> --}}
      </li>



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
