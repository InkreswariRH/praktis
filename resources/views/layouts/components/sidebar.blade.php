<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="{{asset('assets/dist/img/admin.jpg')}}" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#">{{ Auth::user()->name }}</a>
       </div>
     </div>

    
     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
              @if(auth()->user()->is_admin == 1)
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Menu Admin
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('provinsi.index') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Provinsi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('kota.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Kabupaten/Kota</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('kecamatan.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Kecamatan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('kelurahan.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Kelurahan</p>
                    </a>
                  </li>
                </ul>
              </li>
              @endif
              @if(auth()->user()->is_admin == 0)
              <li class="nav-item">
                <a href="{{ route('pasien.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Data Pasien
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>
              @endif
          
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>