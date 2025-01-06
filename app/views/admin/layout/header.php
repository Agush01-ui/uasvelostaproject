<?php

function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Velosta</title>
    <link href="<?= BASEURL ?>/admin/css/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?= BASEURL ?>/admin/css/css//sb-admin-2.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="<?= BASEURL ?>/admin/assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link href="<?= BASEURL ?>/admin/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="<?= BASEURL ?>/admin/assets/ckeditor/ckeditor.js"></script>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/foto/logo.png">
</head>


<?php
if ($_SESSION['admin']['level'] == 'Admin') {
    $bg = "bg-primary";
} elseif ($_SESSION['admin']['level'] == 'Pemilik') {
    $bg = "bg-danger";
}
?>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav <?= $bg ?> sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASEURL ?>/admin/index">

                <div class="sidebar-brand-text mx-3"><img style="width:60%;" src="<?= BASEURL ?>/foto/logo.png"></div>
            </a>
            <hr class="sidebar-divider">
            <?php
            if ($_SESSION['admin']['level'] == 'Admin') {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/index">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/kategoridaftar">
                        <i class="fas fa-fw fa-list"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/produkdaftar">
                        <i class="fas fa-fw fa-pen"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/pemesanan">
                        <i class="fas fa-fw fa-home"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/laporan">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/penggunadaftar">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Member</span>
                    </a>
                </li>

            <?php
            } else if ($_SESSION['admin']['level'] == 'Pemilik') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/index">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <hr class="sidebar-divider">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASEURL ?>/admin/laporan">
                        <i class="fas fa-fw fa-book"></i>
                        <span>Laporan</span>
                    </a>
                </li>

            <?php
            }
            ?>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');" class="nav-link" href="index.php?halaman=logout">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Keluar</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div id="page-inner">