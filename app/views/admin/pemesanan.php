<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Pemesanan</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Daftar</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Pemesanan</th>
                            <th>Status Belanja</th>
                            <?php
                            if ($_SESSION['admin']['level'] == 'Admin') {
                            ?>
                                <th>Aksi</th>
                            <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>

                        <?php foreach ($pemesanan as $pecah) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['nama'] ?></td>
                                <td>
                                    <ul>
                                        <?php foreach ($pecah['produk'] as $produk) { ?>
                                            <li><?= $produk['namaproduk'] ?> x <?= $produk['jumlah'] ?></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                <td><?= tanggal(date('Y-m-d', strtotime($pecah['tanggalbeli']))) ?></td>
                                <td>Rp. <?php echo number_format($pecah['totalbeli'] + $pecah['ongkir']) ?></td>
                                <td><?php echo $pecah['statusbeli'] ?></td>
                                <?php if ($_SESSION['admin']['level'] == 'Admin') { ?>
                                    <td>
                                        <a href="<?= BASEURL ?>/admin/pembayaran/<?php echo $pecah['idpenjualan'] ?>" class="btn btn-info">Detail</a>
                                    </td>
                                <?php } ?>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>