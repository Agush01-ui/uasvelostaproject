<?php
$tanggalawal = $data['tanggalawal'];
$tanggalakhir = $data['tanggalakhir'];
$laporan = $data['laporan'];
?>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Laporan</h6>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="row mt-3 mb-3">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label class="mb-2">Tanggal Awal</label>
                                <input type="date" class="form-control" name="tanggalawal" value="<?= $tanggalawal ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label class="mb-2">Tanggal Akhir</label>
                                <input type="date" class="form-control" name="tanggalakhir" value="<?= $tanggalakhir ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <button type="submit" name="submit" class="btn btn-primary text-white" style="margin-top:30px">Cari</button>
                                <a target="_blank" href="<?= BASEURL ?>/admin/laporancetak?tanggalawal=<?= $tanggalawal ?>&tanggalakhir=<?= $tanggalakhir ?>" class="btn btn-success text-white" style="margin-top:30px">Cetak</a>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered" id="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. Telepon</th>
                            <th>Daftar</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($laporan as $pecah) { ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= $pecah['nama'] ?></td>
                                <td><?= $pecah['telepon'] ?></td>
                                <td>
                                    <ul>
                                        <?php
                                        $db = $this->getDb();
                                        $produk = $db->query("SELECT * FROM penjualan 
                                                                   JOIN produk ON penjualan.idproduk = produk.idproduk 
                                                                   WHERE idpenjualan = '{$pecah['idpenjualan']}'")->fetch_all(MYSQLI_ASSOC);
                                        foreach ($produk as $item) { ?>
                                            <li><?= $item['namaproduk'] ?> <span>(<?= $item['jumlah'] ?>)</span></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><?= date('d-m-Y', strtotime($pecah['tanggalbeli'])) ?></td>
                                <td>Rp. <?= number_format($pecah['totalbeli'], 0, ',', '.') ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>