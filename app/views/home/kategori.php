<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Kategori</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Kategori</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Kategori : <?php echo $kategoridata["namakategori"] ?></p>
            <h1 class="display-6 mb-4">Kategori : <?php echo $kategoridata["namakategori"] ?></h1>
        </div>
      
        <div class="row g-4">
            <?php foreach ($produk as $data) : ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center rounded overflow-hidden">
                        <img class="img-fluid" style="height: 400px; object-fit: cover;" src="<?= BASEURL ?>/foto/<?php echo $data['fotoproduk'] ?>" alt="">
                        <div class="team-text">
                            <div class="team-title">
                                <h5><?php echo $data["namaproduk"] ?></h5>
                                <span><?= $kategoridata["namakategori"] ?></span>
                                <span>Rp <?php echo number_format($data['hargaproduk']) ?></span>

                            </div>
                            <div class="team-social">
                                <a href="<?= BASEURL ?>/home/detail/<?php echo $data['idproduk']; ?>" class="btn btn-primary rounded-pill py-3 px-5 w-100">Pesan</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>