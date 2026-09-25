<head>
    <style>
        .main-sidebar {
            background-color: #AD3B03; /* Coklat */
        }
    </style>
</head>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-3 mb-2 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/admin/dist/img/user2-160x160.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url('profil/tampil_profil') ?>" class="d-block">
            <?php echo $this->session->userdata('username') ?>
          </a>
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
					<a href="<?php echo site_url('dataroti'); ?>" class="nav-link">
					<i class="nav-icon fas fa-th"></i>	
					<p>Data Roti</p>
					</a>
				 </li>
         <li class="nav-item">
          <a href="<?php echo site_url('barangmasuk/masuk'); ?>" class="nav-link">
          <i class="nav-icon fas fa-box"></i>
          <p>Barang Masuk</p>
          </a>
        </li>

         <li class="nav-item">
        <a href="<?php echo site_url('barangkeluar/keluar'); ?>" class="nav-link">
        <i class="nav-icon fas fa-box-open"></i> 
        <p>Barang Keluar</p>
        </a>
      </li>
         <li class="nav-item">
					<a href="<?php echo site_url('bahan/tampil_bahanbaku'); ?>" class="nav-link">
					<i class="nav-icon fas fa-th"></i>	
					<p>Bahan Baku</p>
					</a>
				 </li>
         <li clas="nav-item">
					<a href="<?php echo site_url('profil/tampil_profil'); ?>" class="nav-link">
					<i class="nav-icon fas fa-th"></i>	
					<p>Profil</p>
					</a>
				 </li>
				 <li clas="nav-item">
					<a href="<?php echo site_url('adminpanel/tampilan2'); ?>" class="nav-link">
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
