<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= BASEURL ?>/admin/produkeditsimpan">
                    <input type="hidden" name="idproduk" value="<?= $produk['idproduk']; ?>">
                    <input type="hidden" name="fotolama" value="<?= $produk['fotoproduk']; ?>">

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" value="<?= $produk['namaproduk']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <select class="form-control" name="idkategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($data['datakategori'] as $kategori): ?>
                                <option value="<?php echo $kategori['idkategori']; ?>"
                                    <?php echo ($kategori['idkategori'] == $produk['idkategori']) ? 'selected' : ''; ?>>
                                    <?php echo $kategori['namakategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="<?= $produk['hargaproduk']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Berat (*g)</label>
                        <input type="number" class="form-control" name="berat" value="<?= $produk['beratproduk']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" rows="10" required><?= $produk['deskripsiproduk']; ?></textarea>
                        <script>
                            CKEDITOR.replace('deskripsi');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Foto (Kosongkan jika tidak ingin mengubah)</label>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <div class="form-group">
                        <label>Stok Produk</label>
                        <input type="number" class="form-control" name="stok" value="<?= $produk['stokproduk']; ?>" required>
                    </div>
                    <button class="btn btn-primary" name="edit">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>