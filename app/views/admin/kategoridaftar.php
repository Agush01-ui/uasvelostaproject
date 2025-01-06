<?php if ($_SESSION['admin']['level'] == 'Admin') : ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="<?= BASEURL ?>/admin/kategoritambah" class="btn btn-sm btn-primary shadow-sm float-right pull-right">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kategori
        </a>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <?php if ($_SESSION['admin']['level'] == 'Admin') : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php foreach ($kategori as $data) : ?>
                            <tr>
                                <td><?= $nomor++; ?></td>
                                <td><?= htmlspecialchars($data['namakategori'], ENT_QUOTES, 'UTF-8'); ?></td>
                                <?php if ($_SESSION['admin']['level'] == 'Admin') : ?>
                                    <td>
                                        <a href="<?= BASEURL ?>/admin/kategoriedit/<?= $data['idkategori']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                                        <a href="<?= BASEURL ?>/admin/kategorihapus/<?= $data['idkategori']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>