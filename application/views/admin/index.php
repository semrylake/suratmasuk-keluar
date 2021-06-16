<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner" >
                        <h3><?= count($mahasiswa) ?></h3>
                        <p><a style="color:white" href="<?= base_url('index.php/admin/mahasiswa') ?>" >Mahasiswa Terdaftar</a></p>
                    </div>
                    
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= count($dosen) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/dosen') ?>" >Dosen Terdaftar</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= count($penelitianMhs) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/mahasiswa/penelitian') ?>" >Penelitian Mahasiswa</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= count($penelitianDosen) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/dosen/penelitian') ?>" >Penelitian Dosen</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->
             <!-- ./col -->
             <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= count($suratMasuk) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/surat_masuk') ?>" >Surat Masuk</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->

             <!-- ./col -->
             <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= count($suratKeluar) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/surat_keluar') ?>" >Surat Keluar</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= count($Kegiatan) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/proker') ?>" >Program Kerja</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= count($Personalia) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/personalia') ?>" >Personalia Dosen</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= count($Peng_Mas) ?></h3>

                        <p><a style="color:white" href="<?= base_url('index.php/admin/pengabdian') ?>" >Pengabdian Masyarakat</a></p>
                    </div>

                </div>
            </div>
            <!-- ./col -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php
require_once(__ROOT__ . '/footer.php');
?>