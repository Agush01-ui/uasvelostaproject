<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Pembayaran</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?= BASEURL; ?>">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Pembayaran</li>
            </ol>
        </nav>
    </div>
</div>

<section id="home-section" class="ftco-section">
    <div class="container mt-4">
        <h4 class="text-danger">
            Upload Bukti Pembayaran
        </h4>
        <br>
        <div class="row">
            <div class="col-md-6">
                <strong>NO PEMESANAN: <?= $pemesanan['idpenjualan']; ?></strong><br>
                Status Barang: <?= $pemesanan['statusbeli']; ?><br>
                Total Pemesanan: Rp. <?= number_format($pemesanan['totalbeli']); ?><br>
                Ongkir: Rp. <?= number_format($pemesanan['ongkir']); ?><br>
                Total Bayar: Rp. <?= number_format($pemesanan['totalbeli'] + $pemesanan['ongkir']); ?><br>
                Ekspedisi: <?= $pemesanan['ekspedisi']; ?><br>
                Layanan: <?= $pemesanan['layanan']; ?><br>
            </div>
            <div class="col-md-6">
                <strong>NAMA: <?= $pemesanan['nama']; ?></strong><br>
                Telepon: <?= $pemesanan['telepon']; ?><br>
                Email: <?= $pemesanan['email']; ?><br>
                Alamat Pengiriman: <?= $pemesanan['alamatpengiriman']; ?><br>
                Provinsi: <?= $pemesanan['provinsi']; ?><br>
                Kota: <?= $pemesanan['kota']; ?><br>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
            <thead class="bg-primary text-white">
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
                <?php foreach ($produk as $item): ?>
                    <tr>
                        <td><?= $nomor++; ?></td>
                        <td><?= $item['nama']; ?></td>
                        <td>Rp. <?= number_format($item['harga']); ?></td>
                        <td><?= $item['jumlah']; ?></td>
                        <td>Rp. <?= number_format($item['subharga']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row justify-content-center mb-5 mt-5">
            <div class="col-md-5">
                <img width="100%" src="<?= BASEURL; ?>/foto/bayar.webp">
            </div>
            <div class="col-md-7">
                <div class="alert alert-info">
                    Total Tagihan Anda:
                    <strong>Rp. <?= number_format($pemesanan['totalbeli'] + $pemesanan['ongkir']); ?></strong><br>
                    (Sudah Termasuk biaya pengiriman)
                </div>
                <form method="post" enctype="multipart/form-data" action="<?= BASEURL; ?>/home/pembayaransimpan/<?= $pemesanan['idpenjualan']; ?>">
                    <div class="form-group">
                        <label class="mb-2">Nama Rekening</label>
                        <input type="text" name="nama" class="form-control mb-2" value="<?= $_SESSION['pengguna']['nama']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Tanggal Transfer</label>
                        <input type="date" name="tanggaltransfer" class="form-control mb-2" value="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">Foto Bukti</label>
                        <input type="file" name="bukti" class="form-control mb-2" required>
                    </div>
                    <button class="btn btn-primary w-100 mt-4" name="kirim">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</section>