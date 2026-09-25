<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('assets/home/lib/owlcarousel/assets/owl.carousel.min.css');?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('assets/home/css/style.css');?>" rel="stylesheet">
    <script src ="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<style>
    .container-fluid{
        background-color: #fae9d2;
    }
</style>

<body>
<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <!-- Logo dan Navbar -->
        <div class="col-lg-12 d-flex align-items-center justify-content-between">
            <!-- Logo -->
           
                <h1 class="m-0 display-5 font-weight-semi-bold">
                <img src="<?php echo base_url('assets/logo_bakery.png'); ?>" alt="Logo" class="img-fluid" style="max-width: 89px;">  
                <span class="text-primary font-weight-bold border px-3 mr-1">Toko</span>Roti
                    

                </h1>
          
            
            
           
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <?php if (empty($this->session->userdata('Member'))) { ?>
                            <a href="<?php echo site_url('adminpanel/tampilan2'); ?>" class="nav-item nav-link">Home</a>
                            
                           
                            <a href="<?php echo site_url('adminpanel/login'); ?>" class="nav-item nav-link">Login</a>
                            <a href="<?php echo site_url('adminpanel/tampilan1'); ?>" class="nav-item nav-link">Register</a>
                        <?php } else { ?>
                            <a href="<?php echo site_url(); ?>" class="nav-item nav-link active">Beranda</a>
                            <a href="<?php echo site_url('toko'); ?>" class="nav-item nav-link">Toko</a>
                            <a href="detail.html" class="nav-item nav-link">Transaksi</a>
                            <a href="<?php echo site_url('main/order_history'); ?>" class="nav-item nav-link">Riwayat Pembelian</a>
                            <a href="<?php echo site_url('main/logout'); ?>" class="nav-item nav-link">Logout</a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>


</body>
