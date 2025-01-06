<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Riwayat</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Riwayat</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Riwayat</p>
            <h1 class="display-6 mb-4">Riwayat Pembelian</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <table class="table">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Daftar Produk</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Opsi</th>
                            <th>Bukti Pembayaran</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($riwayat as $pecah) { ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td>
                                    <ul>
                                        <?php
                                        $model = $this->getModel();
                                        $ambilproduk = $model->query("SELECT * FROM penjualan 
                                        JOIN produk ON penjualan.idproduk = produk.idproduk 
                                        WHERE idpenjualan='$pecah[idpenjualanreal]'");
                                        while ($produk = $ambilproduk->fetch_assoc()) { ?>
                                            <li><?= $produk['namaproduk'] ?> x <?= $produk['jumlah'] ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><?= tanggal($pecah['tanggalbeli']) . '<br>Jam ' . date('H:i', strtotime($pecah['waktu'])) ?></td>
                                <td>Rp. <?= number_format($pecah["totalbeli"] + $pecah["ongkir"]) ?></td>
                                <td>
                                    <?php if ($pecah['statusbeli'] == "Belum Bayar") { ?>
                                        <a href="<?= BASEURL ?>/home/pembayaran/<?= $pecah["idpenjualanreal"] ?>" class="btn btn-success">Upload Pembayaran</a>
                                    <?php } elseif ($pecah['statusbeli'] == "Sudah Upload Bukti Pembayaran") { ?>
                                        <a class="btn btn-primary text-white">Menunggu Konfirmasi Admin</a>
                                    <?php } elseif ($pecah['statusbeli'] == "Barang Di Kirim") { ?>
                                        <a class="btn btn-primary text-white">Barang Sedang Dikirim</a>
                                    <?php } elseif ($pecah['statusbeli'] == "Selesai") { ?>
                                        <!-- <a href="ulasan.php?id=<?= $pecah["idpenjualanreal"] ?>" class="btn btn-success text-white">Berikan Ulasan</a> -->
                                        <a class="btn btn-primary text-white">Selesai</a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($pecah['bukti']) { ?>
                                        <img width="100px" src="<?= BASEURL ?>/foto/<?= $pecah['bukti'] ?>" alt="Bukti Pembayaran">
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($pecah['statusbeli'] != "Belum Bayar") { ?>
                                        <a href="<?= BASEURL ?>/home/notacetak/<?= $pecah['idpenjualanreal'] ?>" target="_blank" class="btn btn-primary text-white">Nota</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>