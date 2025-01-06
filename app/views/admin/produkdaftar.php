<?php if ($_SESSION['admin']['level'] == 'Admin') { ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="<?= BASEURL ?>/admin/produktambah" class="btn btn-sm btn-primary shadow-sm float-right pull-right">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Produk
        </a>
    </div>
<?php } ?>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Berat (*g)</th>
                            <th>Foto</th>
                            <th>Stok</th>
                            <?php if ($_SESSION['admin']['level'] == 'Admin') { ?>
                                <th>Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($produk as $pecah) { ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah['namaproduk']; ?></td>
                                <td><?php echo $pecah['namakategori']; ?></td>
                                <td><?php echo $pecah['hargaproduk']; ?></td>
                                <td><?php echo $pecah['beratproduk']; ?></td>
                                <td><img src="<?= BASEURL ?>/foto/<?php echo $pecah['fotoproduk']; ?>" width="100px"></td>
                                <td><?php echo $pecah['stokproduk']; ?></td>
                                <?php if ($_SESSION['admin']['level'] == 'Admin') { ?>
                                    <td>
                                        <a href="<?= BASEURL ?>/admin/produkedit/<?php echo $pecah['idproduk']; ?>" class="btn btn-warning">Ubah</a>
                                        <a href="<?= BASEURL ?>/admin/produkhapus/<?php echo $pecah['idproduk']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
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