<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data <?= $surat ?></h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Surat</li>
                    <li class="breadcrumb-item active"><?= $surat ?></li>
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
                        <h3 class="card-title">Forms <?= $surat ?></h3>
                    </div>

                    <?php if ($isEdit == false) { ?>
                        <!-- form tambah -->
                        <?php if ($surat == 'surat masuk') { ?>

                            <form role="form" action="<?= base_url('index.php/admin/surat_masuk/insert') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form role="form" action="<?= base_url('index.php/admin/surat_keluar/insert') ?>" method="POST" enctype="multipart/form-data">

                                <?php } ?>

                                <?= $this->session->flashdata('error'); ?>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="agenda">Agenda</label>
                                        <input required type="number" class="form-control" id="agenda" name="agenda" placeholder="Agenda Surat">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_surat">Tanggal Surat</label>
                                        <input required type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor_surat">Nomor Surat</label>
                                        <input required type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat">
                                    </div>

                                    <?php if ($surat == 'surat masuk') { ?>
                                        <div class="form-group">
                                            <label for="asal_surat">Asal Surat</label>
                                            <input required type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Asal Surat">
                                        </div>
                                    <?php } else { ?>
                                        <div class="form-group">
                                            <label for="asal_surat">Tujuan Surat</label>
                                            <input required type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Tujuan Surat">
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea required class="form-control" name="deskripsi" id="deskripsi" cols="15" rows="10"></textarea>
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
                            <?php } else { ?>
                                <!-- form edit -->
                                <?php if ($surat == 'surat masuk') { ?>
                                    <form role="form" action="<?= base_url('index.php/admin/surat_masuk/update/' . $dataEdit->id) ?>" method="POST" enctype="multipart/form-data">
                                    <?php } else { ?>
                                        <form role="form" action="<?= base_url('index.php/admin/surat_keluar/update/' . $dataEdit->id) ?>" method="POST" enctype="multipart/form-data">

                                        <?php } ?>



                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="agenda">Agenda</label>
                                                <input required type="number" class="form-control" id="agenda" name="agenda" placeholder="Agenda Surat" value="<?= $dataEdit->agenda ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label for="tanggal_surat">Tanggal Surat</label>
                                                <input required type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" placeholder="Tanggal Surat" value="<?= $dataEdit->tanggal_surat ?>">
                                            </div>
                                            <div class=" form-group">
                                                <label for="nomor_surat">Nomor Surat</label>
                                                <input required type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" value="<?= $dataEdit->nomor_surat ?>">
                                            </div>

                                            <?php if ($surat == 'surat masuk') { ?>
                                                <div class="form-group">
                                                    <label for="asal_surat">Asal Surat</label>
                                                    <input required type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Asal Surat" value="<?= $dataEdit->asal_surat ?>">
                                                </div>
                                            <?php } else { ?>
                                                <div class="form-group">
                                                    <label for="asal_surat">Tujuan Surat</label>
                                                    <input required type="text" class="form-control" id="asal_surat" name="asal_surat" placeholder="Tujuan Surat" value="<?= $dataEdit->asal_surat ?>">
                                                </div>
                                            <?php } ?>

                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea required class="form-control" name="deskripsi" id="deskripsi" cols="15" rows="10" value="<?= $dataEdit->deskripsi ?>"><?= $dataEdit->deskripsi ?></textarea>
                                            </div>
                                            <div class=" form-group">
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
                        <h3 class="card-title">Data <?= $surat ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr align="center" role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Agenda</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tanggal</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nomor</th>
                                                    <?php if ($surat == 'surat masuk') { ?>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Asal</th>
                                                    <?php } else { ?>
                                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tujuan</th>
                                                    <?php } ?>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Deskripsi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">File</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($data as $d) :
                                                    $i++ ?>
                                                    <tr class="<?php ($i % 2 == 0) ? 'even' : 'odd' ?>">
                                                        <td><?= $d->agenda ?></td>
                                                        <td><?= $d->tanggal_surat ?></td>
                                                        <td><?= $d->nomor_surat ?></td>
                                                        <td><?= $d->asal_surat ?></td>
                                                        <td><?= $d->deskripsi ?></td>
                                                        <td>
                                                            <a href="<?= base_url('assets/surat/' . $d->file) ?>" download>
                                                                Download
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php if ($surat == 'surat masuk') { ?>

                                                                <a href="<?= base_url('index.php/admin/surat_masuk/edit/' . $d->id) ?>" class="btn btn-warning btn-sm mb-2"><i class="fa text-white fa-edit"></i></a>
                                                                <a href="<?= base_url('index.php/admin/surat_masuk/delete/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                            <?php } else { ?>
                                                                <a href="<?= base_url('index.php/admin/surat_keluar/edit/' . $d->id) ?>" class="btn btn-warning  mb-2 btn-sm"><i class="fa text-white fa-edit"></i></a>
                                                                <a href="<?= base_url('index.php/admin/surat_keluar/delete/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                            <?php } ?>
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