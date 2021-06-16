<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '\views\header_user.php');
?>
<main>
    <div class="about-details section-padding30">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-lg-10">
                    <div class="about-details-cap mb-50">
                        <h4>Program Kerja</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Tempat</th>
                                            <th scope="col">Realisasi</th>
                                            <th scope="col">File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data as $d) : ?>
                                            <tr>
                                                <td><?= $d->nama ?></td>
                                                <td><?= $d->deskripsi ?></td>
                                                <td><?= $d->tanggal_pelaksanaan ?></td>
                                                <td><?= $d->tempat ?></td>
                                                <td><?= $d->realisasi_kegiatan ?></td>
                                                <td>
                                                    <h6>
                                                        <a href="<?= base_url('assets/penelitian/proker/' . $d->file) ?>" download> Download</a>
                                                    </h6>
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
        </div>
    </div>

</main>


<?php
require_once(__ROOT__ . '\views\footer_user.php');
?>