<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Penelitian Mahasiswa</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Penelitian</li>
                    <li class="breadcrumb-item active">Mahasiswa</li>
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
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->userdata('error') ?>

                        <?php if ($isEdit == false) { ?>
                            <form method="POST" action="<?= base_url('index.php/admin/mahasiswa/insertPenelitianMahasiswa') ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="dosen">Mahasiswa</label>
                                    <select class="form-control" id="dosen" name="id_mhs">
                                        <?php foreach ($mahasiswa as $m) : ?>
                                            <option value="<?= $m->id ?>"><?= $m->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Enter Judul" name="judul">
                                </div>
                                <div class="form-group">
                                    <label for="tahun_penelitian">Tahun</label>
                                    <input type="text" class="form-control" id="tahun_penelitian" placeholder="Enter Tahun Penelitian" name="tahun_penelitian">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_penelitian">Tempat</label>
                                    <input type="text" class="form-control" id="tempat_penelitian" placeholder="Enter Tempat Penelitian" name="tempat_penelitian">
                                </div>
                                <div class="form-group">
                                    <label for="dosen">Pembimbing</label>
                                    <select class="form-control" id="dosen" name="pembimbing">
                                        <?php foreach ($dosen as $p) : ?>
                                            <option value="<?= $p->nama ?>"><?= $p->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dosen">Penguji</label>
                                    <select class="form-control" id="dosen" name="penguji">
                                        <?php foreach ($dosen as $pn) : ?>
                                            <option value="<?= $pn->nama ?>"><?= $pn->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input required type="file" class="form-control-file" id="file" name="fotopost">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } else { ?>
                            <form method="POST" action="<?= base_url('index.php/admin/mahasiswa/updatePenelitianMahasiswa/' . $edit->id) ?>" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="dosen">Dosen</label>
                                    <select class="form-control" id="dosen" name="id_mhs">
                                        <?php foreach ($mahasiswa as $m) : ?>
                                            <?php if ($m->id == $edit->id_mhs) { ?>
                                                <option selected value="<?= $m->id ?>"><?= $m->nama ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $m->id ?>"><?= $m->nama ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" placeholder="Enter Judul" name="judul" value="<?= $edit->judul ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tahun_penelitian">Tahun</label>
                                    <input type="text" class="form-control" id="tahun_penelitian" placeholder="Enter Tahun Penelitian" name="tahun_penelitian" value="<?= $edit->tahun_penelitian ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_penelitian">Tempat</label>
                                    <input type="text" class="form-control" id="tempat_penelitian" placeholder="Enter Tempat Penelitian" name="tempat_penelitian" value="<?= $edit->tempat_penelitian ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dosen">Pembimbing</label>
                                    <select class="form-control" id="dosen" name="pembimbing">
                                        <?php foreach ($dosen as $p) : ?>
                                            <?php if ($p->nama == $edit->pembimbing) { ?>
                                                <option selected value="<?= $p->nama ?>"><?= $p->nama ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $p->nama ?>"><?= $p->nama ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dosen">Penguji</label>
                                    <select class="form-control" id="dosen" name="penguji">
                                        <?php foreach ($dosen as $pn) : ?>
                                            <?php if ($pn->nama == $edit->penguji) { ?>
                                                <option selected value="<?= $pn->nama ?>"><?= $pn->nama ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $pn->nama ?>"><?= $pn->nama ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input required type="file" class="form-control-file" id="file" name="fotopost">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } ?>

                    </div>
                </div>

            </div>
            <div class="col-9">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Penelitian Mahasiswa</h3>
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
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mahasiswa</th>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Judul</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tahun</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="2" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tempat Penelitian</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Pembimbing</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Penguji</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">File</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($data as $d) :
                                                    $i++ ?>
                                                    <tr class="<?php ($i % 2 == 0) ? 'even' : 'odd' ?>">

                                                        <td><?= $d->namaMahasiswa ?></td>
                                                        <td><?= $d->judul ?></td>
                                                        <td><?= $d->tahun_penelitian ?></td>
                                                        <td><?= $d->tempat_penelitian ?></td>
                                                        <td><?= $d->pembimbing ?></td>
                                                        <td><?= $d->penguji ?></td>
                                                        <td><a href="<?= base_url('assets/penelitian/dosen/' . $d->file) ?>" download>Download</a></td>
                                                        <td>
                                                            <a href="<?= base_url('index.php/admin/mahasiswa/editPenelitian/' . $d->id) ?>" class="btn mb-2 btn-warning btn-sm"><i class="fa text-white fa-edit"></i></a>
                                                            <a href="<?= base_url('index.php/admin/mahasiswa/delete_penelitian/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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