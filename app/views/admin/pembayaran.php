<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pemesanan</h6>
            </div>
            <div class="card-body">
                <!-- Detail Pemesanan -->
                <div class="row">
                    <div class="col-md-6">
                        <h3>Pemesanan</h3>
                        <hr>
                        <strong>NO PEMESANAN: <?php echo $detail['idpenjualan']; ?></strong><br>
                        Tanggal : <?= tanggal(date('Y-m-d', strtotime($detail['tanggalbeli']))) ?><br>
                        Status Barang : <?php echo $detail['statusbeli']; ?><br>
                        Total Pemesanan : Rp. <?php echo number_format($detail['totalbeli']); ?><br>
                        Total Bayar : Rp. <?php echo number_format($detail['ongkir'] + $detail['totalbeli']); ?><br>
                        Ekspedisi : <?php echo $detail['ekspedisi']; ?><br>
                        Layanan : <?php echo $detail['layanan']; ?><br>
                        Ongkir : Rp. <?php echo number_format($detail['ongkir']); ?><br>
                    </div>
                    <div class="col-md-6">
                        <h3>Pelanggan</h3>
                        <hr>
                        <strong>NAMA : <?php echo $detail['nama']; ?></strong><br>
                        Telepon : <?php echo $detail['telepon']; ?><br>
                        Email : <?php echo $detail['email']; ?><br>
                        Kota : <?php echo $detail['kota']; ?><br>
                        Provinsi : <?php echo $detail['provinsi']; ?><br>
                        Alamat Pengiriman : <?php echo $detail['alamatpengiriman']; ?><br>
                        Metode Pengiriman : <?php echo $detail['metodepengiriman']; ?><br>
                    </div>
                </div>
                <br>
                <!-- Tabel Daftar Produk -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($produk as $item) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $item['nama']; ?></td>
                                <td>Rp. <?php echo number_format($item['harga']); ?></td>
                                <td><?php echo $item['jumlah']; ?></td>
                                <td>Rp. <?php echo number_format($item['subharga']); ?></td>
                            </tr>
                            <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Konfirmasi</h6>
            </div>
            <div class="card-body">
                <form method="post" action="<?= BASEURL ?>/admin/konfirmasisimpan/<?php echo $detail['idpenjualan'] ?>">
                    <div class="form-group">
                        <label>Masukkan No Resi Pengiriman</label>
                        <input type="text" class="form-control" name="resi" value="<?php echo $detail['resipengiriman'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="statusbeli">
                            <option <?php if ($detail['statusbeli'] == 'Belum di Konfirmasi') echo 'selected'; ?> value="Belum di Konfirmasi">Belum di Konfirmasi</option>
                            <option <?php if ($detail['statusbeli'] == 'Belum Bayar') echo 'selected'; ?> value="Belum Bayar">Belum Bayar</option>
                            <option <?php if ($detail['statusbeli'] == 'Pesanan Di Tolak') echo 'selected'; ?> value="Pesanan Di Tolak">Pesanan Di Tolak</option>
                            <option <?php if ($detail['statusbeli'] == 'Barang Di Kemas') echo 'selected'; ?> value="Barang Di Kemas">Barang Di Kemas</option>
                            <option <?php if ($detail['statusbeli'] == 'Barang Di Kirim') echo 'selected'; ?> value="Barang Di Kirim">Barang Di Kirim</option>
                            <option <?php if ($detail['statusbeli'] == 'Barang Telah Sampai ke Pemesan') echo 'selected'; ?> value="Barang Telah Sampai ke Pemesan">Barang Telah Sampai ke Pemesan</option>
                        </select>
                    </div>
                    <button class=" btn btn-primary float-right pull-right" name="proses">Simpan</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
    <?php if ($detail['statusbeli'] != "Selesai" && $detail['statusbeli'] != "Belum Bayar") { ?>
        <div class="col-md-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Bukti Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $db = $this->getDb();
                            $ambilproduk = $db->query("SELECT * FROM pembayaran 
                                        WHERE idpenjualan='$detail[idpenjualan]'");
                            $pembayaran = $ambilproduk->fetch_assoc();
                            ?>
                            <?php if (!empty($pembayaran)) : ?>
                                <table class="table">
                                    <tr>
                                        <th>Nama</th>
                                        <th><?php echo $pembayaran['nama'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Transfer</th>
                                        <th><?= tanggal(date('Y-m-d', strtotime($pembayaran['tanggaltransfer']))) ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Upload Bukti Pembayaran</th>
                                        <th><?= tanggal(date('Y-m-d', strtotime($pembayaran['tanggal']))) ?></th>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Bukti Pembayaran</h4>
                                        <img width="80%" src="<?= BASEURL; ?>/foto/<?php echo $pembayaran['bukti'] ?>" alt="" class="img-responsive">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>