<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Program Kerja</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Proker</li>
                    <li class="breadcrumb-item active">Program Kerja</li>
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
                        <h3 class="card-title">Forms Program Kerja</h3>
                    </div>

                    <?php if ($isEdit == false) { ?>
                        <!-- form tambah -->
                        <form role="form" action="<?= base_url('index.php/admin/proker/insertProker') ?>" method="POST" enctype="multipart/form-data">

                            <?= $this->session->flashdata('error'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <select required class="form-control" name="jenis_kegiatan" id="jenis_kegiatan">
                                        <?php foreach ($dataJenis as $jenis) : ?>
                                            <option value="<?= $jenis->id ?>"><?= $jenis->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea required class="form-control" name="deskripsi" id="deskripsi" cols="15" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                                    <input type="date" required class="form-control" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan">
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input type="text" required class="form-control" name="tempat" id="tempat">
                                </div>
                                <div class="form-group">
                                    <label for="realisasi_kegiatan">Realisasi Kegiatan</label>
                                    <input type="text" required class="form-control" name="realisasi_kegiatan" id="realisasi_kegiatan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input required type="file" required class="custom-file-input" id="file" name="fotopost">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    <?php } else { ?>
                        <!-- form edit -->
                        <form role="form" action="<?= base_url('index.php/admin/proker/updateProker/' . $dataEdit->id) ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kegiatan">Jenis Kegiatan</label>
                                    <select class="form-control" name="jenis_kegiatan" id="jenis_kegiatan">
                                        <?php foreach ($dataJenis as $jenis) : ?>
                                            <?php if ($jenis->id == $dataEdit->id) { ?>
                                                <option selected value="<?= $jenis->id ?>"><?= $jenis->nama ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $jenis->id ?>"><?= $jenis->nama ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="15" rows="10"><?= $dataEdit->deskripsi  ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
                                    <input type="date" class="form-control" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" value="<?= $dataEdit->tanggal_pelaksanaan  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <input type="text" class="form-control" name="tempat" id="tempat" value="<?= $dataEdit->tempat  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="realisasi_kegiatan">Realisasi Kegiatan</label>
                                    <input type="text" class="form-control" name="realisasi_kegiatan" id="realisasi_kegiatan" value="<?= $dataEdit->realisasi_kegiatan  ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input required type="file" class="custom-file-input" id="file" name="fotopost">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                    </div>
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
                        <h3 class="card-title">Data Program Kerja</h3>
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
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Jenis</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">deskripsi</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Pelaksanaan</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tempat</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Realisasi</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">File</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($data as $d) :
                                                    $i++ ?>
                                                    <tr class="<?php ($i % 2 == 0) ? 'even' : 'odd' ?>">
                                                        <td><?= $d->nama ?></td>
                                                        <td><?= $d->deskripsi ?></td>
                                                        <td><?= $d->tanggal_pelaksanaan ?></td>
                                                        <td><?= $d->tempat ?></td>
                                                        <td><?= $d->realisasi_kegiatan ?></td>
                                                        <td>
                                                            <a href="<?= base_url('assets/surat/' . $d->file) ?>" download>
                                                                Download
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('index.php/admin/proker/editProker/' . $d->id) ?>" class="btn btn-warning btn-sm mb-2"><i class="fa fa-edit text-white"></i></a>
                                                            <a href="<?= base_url('index.php/admin/proker/deleteProker/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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