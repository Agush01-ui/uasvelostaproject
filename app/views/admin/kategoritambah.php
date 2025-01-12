<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
            </div>
            <div class="card-body">
                <form method="post" action="<?= BASEURL ?>/admin/kategoritambahsimpan">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori">
                    </div>
                    <button class="btn btn-primary" name="tambah">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>