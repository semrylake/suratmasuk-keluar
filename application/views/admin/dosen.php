<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/header.php');
?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Dosen</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('index.php/admin/dashboard') ?>">Home</a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active">Dosen</li>
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
                            <form action="<?= base_url('index.php/admin/dosen/insertDosen') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIDN</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nidn" placeholder="Enter Nidn">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input required type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter alamat">
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select required class="form-control" name="id_jabatan">
                                        <?php foreach ($jabatan as $j) : ?>
                                            <option value="<?= $j->nama ?>"><?= $j->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="JenisKelamin">Jenis Kelamin</label>
                                    <select required class="form-control" name="jk">
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input required type="text" class="form-control" id="telepon" name="tlp" placeholder="Enter telepon">
                                </div>
                                <div class="form-group">
                                    <label for="tempat lahir">Tempat Lahir</label>
                                    <input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter tempat lahir">
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
                            <form action="<?= base_url('index.php/admin/dosen/updateDosen/' . $edit->id) ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIDN</label>
                                    <input required type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nidn" placeholder="Enter Nidn" value="<?= $edit->nidn ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input required type="text" class="form-control" id="nama" name="nama" placeholder="Enter nama" value="<?= $edit->nama ?>">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter alamat" value="<?= $edit->alamat ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select required class="form-control" name="id_jabatan">
                                        <?php foreach ($jabatan as $j) : ?>
                                            <?php if ($j->nama == $edit->id_jabatan) { ?>
                                                <option selected value="<?= $j->nama ?>"><?= $j->nama ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $j->nama ?>"><?= $j->nama ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="JenisKelamin">Jenis Kelamin</label>
                                    <select required class="form-control" name="jk">
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
                                    <input required type="text" class="form-control" id="telepon" name="tlp" placeholder="Enter telepon" value="<?= $edit->tlp ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tempat lahir">Tempat Lahir</label>
                                    <input required type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Enter tempat lahir" value="<?= $edit->tempat_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal lahir">Tanggal Lahir</label>
                                    <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Enter tanggal lahir" value="<?= $edit->tanggal_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Foto</label>
                                    <input required type="file" class="form-control-file" id="exampleFormControlFile1" value="<?= $edit->foto ?>" name="fotopost">
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
                        <h3 class="card-title">Data Yang Berisi Profil Dosen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">

                                <!-- <div class="col-sm-12 col-md-6">
                                    <div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div>
                                </div> -->
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">NIDN</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nama</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Jabatan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">JK</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Alamat</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tlp</th>
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
                                                        <td><?= $d->nidn ?></td>
                                                        <td><?= $d->nama ?></td>
                                                        <td><?= $d->id_jabatan ?></td>
                                                        <td><?= $d->jk ?></td>
                                                        <td><?= $d->alamat ?></td>
                                                        <td><?= $d->tlp ?></td>
                                                        <td><?= $d->tempat_lahir . ', ' . $d->tanggal_lahir ?></td>
                                                        <td><img width="50" src="<?= base_url('assets/foto/dosen/' . $d->foto) ?>" alt=""></td>
                                                        <td>
                                                            <a href="<?= base_url('index.php/admin/dosen/editDosen/' . $d->id) ?>" class="btn btn-warning mb-2 btn-sm"><i class="fa text-white fa-edit"></i></a>
                                                            <a href="<?= base_url('index.php/admin/dosen/delete/' . $d->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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