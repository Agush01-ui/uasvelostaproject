<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Akun</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Akun</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Profil Akun</p>
            <h1 class="display-6 mb-4">Profil Akun</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <form method="post" action="<?= BASEURL; ?>/home/akunsimpan">
                    <div class="row g-3">
                        <div class="form-group">
                            <label class="mb-2">Nama</label>
                            <input value="<?php echo $akun['nama']; ?>" type="text" value="" class="form-control mb-2" name="nama">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Email</label>
                            <input value="<?php echo $akun['email']; ?>" type="email" class="form-control mb-2" name="email">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Telepon</label>
                            <input value="<?php echo $akun['telepon']; ?>" type="number" class="form-control mb-2" name="telepon">
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Alamat</label>
                            <textarea value="<?php echo $akun['alamat']; ?>" class="form-control mb-2" name="alamat" id="alamat" rows="5"><?php echo $akun['alamat']; ?></textarea>
                            <script>
                                CKEDITOR.replace('alamat');
                            </script>
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="text" class="form-control" name="password">
                            <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5 w-100" name="ubah" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>