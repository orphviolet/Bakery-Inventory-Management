<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo isset($data_roti_count) ? $data_roti_count : 0; ?></h3>
                            <p>Data Roti</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-hamburger"></i>
                        </div>
                        <a href="<?php echo site_url('dataroti') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-6 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo isset($bahan_baku_count) ? $bahan_baku_count : 0; ?></h3>
                            <p>Bahan Baku</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-basket"></i>
                        </div>
                        <a href="<?php echo site_url('bahan/tampil_bahanbaku') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
