<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?> </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/ticker-style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/user/news-master/assets/css/style.css">
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top black-bg d-none d-sm-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li class="title"><img src="<?= base_url() ?>assets/carousel/logo.png" width="50" style="margin-right: 20px"></span> Fakultas Filsafat UNWIRA KUPANG</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-date">
                                        <li><span class="flaticon-calendar"></span> <?= date('d-m-Y') ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-bottom header-sticky bg-success">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?= base_url('index.php/home') ?>">Home</a></li>
                                            <li><a href="#">Penelitian</a>
                                                <ul class="submenu">
                                                    <li><a href="<?= base_url('index.php/penelitian') ?>">Dosen</a></li>
                                                    <li><a href="<?= base_url('index.php/penelitian/mahasiswa') ?>">Mahasiswa</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('index.php/proker') ?>">Program Kerja</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="header-right f-right d-none d-lg-block">
                                    <!-- Heder social -->
                                    <ul class="header-social">
                                        <li><a href="<?= base_url('index.php/log') ?>">Login</a></li>
                                    </ul>

                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>