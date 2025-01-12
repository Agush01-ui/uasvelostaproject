<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" style="height: 800px;object-fit: cover;" src="<?= BASEURL ?>/home/img/cr1.png" alt="">

        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" style="height: 800px;object-fit: cover;" src="<?= BASEURL ?>/home/img/cr2.png" alt="">

        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" style="height: 800px;object-fit: cover;" src="<?= BASEURL ?>/home/img/cr3.png" alt="">

        </div>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">

            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <div style="margin: 0; padding: 0; text-align: center;">
                    <h1 class="display-6 mb-4" style="margin-top: 10px;">Tentang Kami</h1>
                    <p style="margin-top: 5px;">Kenapa Harus Belanja Sepatu Di Website Kami?</p> </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="team-item text-center rounded overflow-hidden">
                                <img class="img-fluid" src="<?= BASEURL ?>/home/img/Coll 1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-item text-center rounded overflow-hidden">
                                <img class="img-fluid" src="<?= BASEURL ?>/home/img/Coll 2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="team-item text-center rounded overflow-hidden">
                                <img class="img-fluid" src="<?= BASEURL ?>/home/img/Coll 3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Produk</p>
            <h1 class="display-6 mb-4">Produk</h1>
        </div>
        <div class="row g-4">
            <?php if (!empty($produk)) : ?>

                <?php foreach ($produk as $perproduk): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="team-item text-center rounded overflow-hidden">
                            <img class="img-fluid" src="<?= BASEURL ?>/foto/<?php echo $perproduk['fotoproduk'] ?>" alt="">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5><?php echo $perproduk["namaproduk"] ?></h5>
                                    <span>Rp <?php echo number_format($perproduk['hargaproduk']) ?></span>
                                </div>
                                <div class="team-social">
                                    <a href="<?= BASEURL ?>/home/detail/<?php echo $perproduk['idproduk']; ?>" class="btn btn-primary rounded-pill py-3 px-5 w-100">Pesan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>
        </div>
    </div>
</div>