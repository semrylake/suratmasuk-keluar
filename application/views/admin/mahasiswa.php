<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Mahasiswa</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Profile</li>
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
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <?= $this->session->userdata('error') ?>

                        <?php if ($isEdit == false) { ?>
                            <form action="<?= base_url('index.php/admin/mahasiswa/insertMahasiswa') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIM</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nim" placeholder="Enter nim">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input required type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" required class="form-control" id="alamat" name="alamat" placeholder="Enter alamat">
                                </div>
                                <div class="form-group">
                                    <label for="JenisKelamin">Jenis Kelamin</label>
                                    <select class="form-control" required name="jk">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" required id="telepon" name="tlp" placeholder="Enter telepon">
                                </div>
                                <div class="form-group">
                                    <label for="tempat lahir">Tempat Lahir</label>
                                    <input type="text" required class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter tempat lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal lahir">Tanggal Lahir</label>
                                    <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Enter tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input required type="file" class="form-control-file" id="exampleFormControlFile1" name="fotopost">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } else { ?>
                            <form action="<?= base_url('index.php/admin/mahasiswa/updateMahasiswa/' . $edit->id) ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIM</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nim" placeholder="Enter Nidn" value="<?= $edit->nim ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama" value="<?= $edit->nama ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter alamat" value="<?= $edit->alamat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="JenisKelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jk">
                                        <?php if ($edit->jk == 'Pria') { ?>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        <?php } else { ?>
                                            <option value="Wanita">Wanita</option>
                                            <option value="Pria">Pria</option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="tlp" placeholder="Enter telepon" value="<?= $edit->tlp ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter tempat lahir" value="<?= $edit->tempat_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Enter tanggal lahir" value="<?= $edit->tanggal_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input required type="file" class="form-control-file" id="exampleFormControlFile1" name="fotopost">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Yang Berisi Profil Mahasiswa</h3>
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
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">NIM</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">JK</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Alamat</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">TLP</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">TTL</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Foto</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                foreach ($data as $d) :
                                                    $i++ ?>
                                                    <tr class="<?php ($i % 2 == 0) ? 'even' : 'odd' ?>">

                                                        <td><?= $d->nim ?></td>
                                                        <td><?= $d->nama ?></td>
                                                        <td><?= $d->jk ?></td>
                                                        <td><?= $d->alamat ?></td>
                                                        <td><?= $d->tlp ?></td>
                                                        <td><?= $d->tempat_lahir . ', ' . $d->tanggal_lahir ?></td>
                                                        <td><img width="50" src="<?= base_url('assets/foto/mahasiswa/' . $d->foto) ?>"></td>
                                                        <td>
                                                            <a href="<?= base_url('index.php/admin/mahasiswa/editDosen/' . $d->id) ?>" class="btn btn-warning mb-2 btn-sm"><i class="fa fa-edit text-white"></i></a>
                                                            <a href="<?= base_url('index.php/admin/mahasiswa/delete/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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