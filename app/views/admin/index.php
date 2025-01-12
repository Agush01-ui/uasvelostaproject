<?php
// Data yang dikirim dari controller
$jumlahkategori = $data['jumlahkategori'];
$jumlahproduk = $data['jumlahproduk'];
$jumlahmember = $data['jumlahmember'];
$jumlahpemesanan = $data['jumlahpemesanan'];
?>
<div class="container-fluid">
    <br>
    <div class="row mb-3">
        <div class="col-md-12">
            <center>
                <img src="../foto/bgdepan.png" width="400px" style="border-radius: 10px">
            </center>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahkategori ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="index.php?halaman=kategori" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahproduk ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="index.php?halaman=produk" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Member</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahmember ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="index.php?halaman=pengguna" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahpemesanan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                    <a href="index.php?halaman=pemesanan" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>