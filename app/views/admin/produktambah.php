<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= BASEURL ?>/admin/produktambahsimpan">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <select class="form-control" name="idkategori" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($data['datakategori'] as $kategori): ?>
                                <option value="<?php echo $kategori['idkategori']; ?>">
                                    <?php echo $kategori['namakategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" required>
                    </div>
                    <div class="form-group">
                        <label>Berat (*g)</label>
                        <input type="number" class="form-control" name="berat" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="10" required></textarea>
                        <script>
                            CKEDITOR.replace('deskripsi');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <div class="form-group">
                        <label>Stok Produk</label>
                        <input type="number" class="form-control" name="stok" required>
                    </div>
                    <button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-saved"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>