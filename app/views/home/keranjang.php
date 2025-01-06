<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Keranjang</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Keranjang</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6 mb-4">Keranjang</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <?php if (!empty($data['keranjang'])): ?>
                    <table class="table">
                        <thead class="bg-primary text-white">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Produk</th>
                                <th>Foto Produk</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php foreach ($data['keranjang'] as $produk): ?>
                                <tr class="text-center">
                                    <td><?= $nomor++; ?></td>
                                    <td><?= $produk['namaproduk']; ?></td>
                                    <td><img width="100px" src="<?= BASEURL; ?>/foto/<?= $produk['fotoproduk']; ?>"></td>
                                    <td>Rp <?= number_format($produk['hargaproduk']); ?></td>
                                    <td><?= $produk['jumlah']; ?></td>
                                    <td>Rp <?= number_format($produk['totalharga']); ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>/home/keranjanghapus/<?= $produk['idproduk']; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">Keranjang Anda kosong.</p>
                <?php endif; ?>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <a href="<?= BASEURL; ?>" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Lanjutkan Belanja</a>
            &nbsp;<a href="<?= BASEURL; ?>/home/checkout" class="btn btn-primary">Checkout</a>
        </div>
        <br><br>
    </div>
</div>