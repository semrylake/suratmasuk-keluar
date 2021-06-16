<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data jenis kegiatan</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Proker</li>
                    <li class="breadcrumb-item active">Jenis Kegiatan</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">


        <div class="row">

            <div class="col-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Forms Jenis Kegiatan</h3>
                    </div>
                    <?php if ($isEdit == false) { ?>
                        <!-- form tambah -->
                        <form role="form" action="<?= base_url('index.php/admin/proker/insertJenisKegiatan') ?>" method="POST" enctype="multipart/form-data">

                            <?= $this->session->flashdata('error'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis kegiatan">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <!-- form edit -->
                        <form role="form" action="<?= base_url('index.php/admin/proker/updateJenisKegiatan/' . $dataEdit->id) ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kegiata">Jenis Kegiatan</label>
                                    <input type="text" class="form-control" id="jenis_kegiatan" name="jenis_kegiatan" placeholder="Jenis kegiatan" value="<?= $dataEdit->nama ?>">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php } ?>

                </div>
            </div>

            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Jenis Kegiatan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($data as $d) :
                                                    $i++ ?>
                                                    <tr class="<?php ($i % 2 == 0) ? 'even' : 'odd' ?>">
                                                        <td><?= $d->nama ?></td>
                                                        <td>
                                                            <a href="<?= base_url('index.php/admin/proker/editJenisKegiatan/' . $d->id) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit text-white"></i></a>
                                                            <a href="<?= base_url('index.php/admin/proker/deleteJenisKegiatan/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<?php
require_once(__ROOT__ . '/footer.php');
?>