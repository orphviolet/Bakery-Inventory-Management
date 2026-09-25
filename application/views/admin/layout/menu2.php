<head>
    <style>
        .main-sidebar {
            background-color: #AD3B03; /* Coklat */
        }

       
        .direct-chat-contacts {
            background-color: #FF4500; /* Coklat */
        }

        .content-wrapper {
            background-color: #FDF5E6; /* Coklat */
            color: black; /* Mengubah warna teks menjadi putih agar kontras */
        }
   
    </style>

</head>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/admin/dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Toko Roti</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Dimas</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li clas="nav-item">
					<a href="<?php echo site_url('adminpanel/dashboard'); ?>" class="nav-link">
					<i class="nav-icon fas fa-tachometer-alt"></i>	
					<p>Dashboard</p>
					</a>
				 </li>
				 <li clas="nav-item">
					<a href="<?php echo site_url('kategori'); ?>" class="nav-link">
					<i class="nav-icon fas fa-th"></i>	
					<p>Kategori</p>
					</a>
				 </li>
				 		 <li clas="nav-item">
					<a href="<?php echo site_url('ongkir'); ?>" class="nav-link">
					<i class="nav-icon fas fa-th"></i>	
					<p>Kelola Roti</p>
					</a>
				 </li>
				 <li clas="nav-item">
					<a href="<?php echo site_url('member'); ?>" class="nav-link">
					<i class="nav-icon fas fa-user"></i>	
					<p>Barang Masuk</p>
					</a>
				 </li>
         <li clas="nav-item">
					<a href="<?php echo site_url('member'); ?>" class="nav-link">
					<i class="nav-icon fas fa-user"></i>	
					<p>Barang Keluar</p>
					</a>
				 </li>
         <li clas="nav-item">
					<a href="<?php echo site_url('member'); ?>" class="nav-link">
					<i class="nav-icon fas fa-user"></i>	
					<p>Bahan Baku</p>
					</a>
				 </li>
         <li clas="nav-item">
					<a href="<?php echo site_url('profil'); ?>" class="nav-link">
					<i class="nav-icon fas fa-user"></i>	
					<p>Profil</p>
					</a>
				 </li>
				 <li clas="nav-item">
					<a href="<?php echo site_url('adminpanel/logout'); ?>" class="nav-link">
					<i class="nav-icon fas fa-circle"></i>	
					<p>Logout</p>
					</a>
				 </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
