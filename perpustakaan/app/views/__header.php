<!DOCTYPE html>
<html>

<head>
    <title>AcBook - <?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fontawesome.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/owl.theme.default.min.css') ?>">
</head>

<body>

    <div class="header <?php echo ($hero) ? '' : 'header-single' ?>">
        <div class="container clearfix">
            <div class="logo">
                <a href="<?php echo base_url() ?>">
                    <span class="logo-top">AcBook</span>
                    <span class="logo-bottom">Toko Buku Online</span>
                </a>
            </div>
            <ul class="menu">
                <li><a <?php echo (Input::get('p') == 'buku') ? 'class="active"' : '' ?> href="<?php echo base_url('buku') ?>">Buku</a></li>
                <li><a <?php echo (Input::get('p') == 'tentang') ? 'class="active"' : '' ?> href="<?php echo base_url('tentang') ?>">Tentang</a></li>
                <li><a <?php echo (Input::get('p') == 'kontak') ? 'class="active"' : '' ?> href="<?php echo base_url('kontak') ?>">Kontak</a></li>
            </ul>
        </div>
    </div>

    <?php if ($hero) { ?>
        <div class="hero">
            <div class="container">
                <div class="hero-item">
                    <h2 style="margin-bottom: 10px;color:#FFFFFF">Bingung mencari buku? Silahkan gunakan pencarian kami</h2>
                    <div class="search">
                        <form method="get" class="clearfix">
                            <input type="search" name="search" class="form-control" placeholder="Type search and hit enter"><button class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>


    <div class="content">