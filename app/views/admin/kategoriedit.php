<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Kategori</h6>
            </div>
            <div class="card-body">
                <form method="post" action="<?= BASEURL ?>/admin/kategorieditsimpan">
                    <!-- Menyertakan ID kategori dalam form -->
                    <input type="hidden" name="id" value="<?= $data['kategori']['idkategori']; ?>">

                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" value="<?= $data['kategori']['namakategori']; ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="edit">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>