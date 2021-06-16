<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pengabdian</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Data Dosen</li>
                    <li class="breadcrumb-item active">Pengabdian</li>
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

            <div class="col-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Forms Pengabdian</h3>
                    </div>
                    <?php if ($isEdit == false) { ?>
                        <!-- form tambah -->
                        <form role="form" action="<?= base_url('index.php/admin/pengabdian/insertPengabdian') ?>" method="POST" enctype="multipart/form-data">

                            <?= $this->session->flashdata('error'); ?>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="dosen">Nama Dosen</label>
                                    <select class="form-control" id="dosen" name="dosen">
                                        <?php foreach ($data as $d) : ?>
                                            <option value="<?= $d->nama ?>"><?= $d->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input required type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Nama Kegiatan">
                                </div>

                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input required type="date" class="form-control" id="tgl" name="tgl" placeholder="Enter Tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="tempat"> Nama Tempat</label>
                                    <input required type="text" class="form-control" id="tempat" name="tempat" placeholder="Nama Tempat">
                                </div>
                                <div class="form-group">
                                    <label for="realisasi"> Realisasi</label>
                                    <input required type="text" class="form-control" id="realisasi" name="realisasi" placeholder="Realisasi">
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input required type="file" class="form-control-file" id="file" name="filepost">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <!-- form edit -->
                        <form role="form" action="<?= base_url('index.php/admin/pengabdian/updatePengabdian/' . $edit->id) ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="dosen">Dosen</label>
                                    <select class="form-control" id="dosen" name="dosen">
                                        <?php foreach ($data as $d) : ?>
                                            <?php if ($d->id == $edit->id) { ?>
                                                <option selected value="<?= $d->nama ?>"><?= $d->nama ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $d->nama ?>"><?= $d->nama ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input required type="text" class="form-control" id="kegiatan" name="kegiatan" placeholder="Nama Kegiatan" value="<?= $edit->kegiatan ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input required type="date" class="form-control" id="tgl" name="tgl" placeholder="Enter Tanggal" value="<?= $edit->tgl ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat"> Nama Tempat</label>
                                    <input required type="text" class="form-control" id="tempat" name="tempat" placeholder="Nama Tempat" value="<?= $edit->tempat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="realisasi"> Realisasi</label>
                                    <input required type="text" class="form-control" id="realisasi" name="realisasi" placeholder="Realisasi" value="<?= $edit->realisasi ?>">
                                </div>


                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input required type="file" class="form-control-file" id="file" name="filepost">
                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php } ?>

                </div>
            </div>

            <div class="col-9">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pengabdian Dosen</h3>
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

                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama Dosen</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama Kegiatan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tanggal Kegiatan</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama Tempat</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Realisasi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">File</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($data_peng as $d) :
                                                    $i++ ?>
                                                    <tr class="<?php ($i % 2 == 0) ? 'even' : 'odd' ?>">
                                                        <td><?= $d->nama ?></td>
                                                        <td><?= $d->kegiatan ?></td>
                                                        <td><?= $d->tgl ?></td>
                                                        <td><?= $d->tempat ?></td>
                                                        <td><?= $d->realisasi ?></td>

                                                        <td>
                                                            <a href="<?= base_url('assets/dosen/Pengabdian/' . $d->file) ?>" download>Download</a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('index.php/admin/Pengabdian/editPengabdian/' . $d->id) ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-edit text-white"></i></a>
                                                            <a href="<?= base_url('index.php/admin/Pengabdian/deletePengabdian/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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