<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Produk</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Produk</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Produk</p>
            <h1 class="display-6 mb-4">Produk</h1>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row g-4">
            <?php if (!empty($produk)) : ?>

                <?php

                foreach ($produk as $data) {
                    $idproduk = $data['idproduk'];



                    echo '
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item text-center rounded overflow-hidden">
                <img style="height: 400px; object-fit: cover;" class="img-fluid" src="' .  BASEURL . '/foto/' . $data['fotoproduk'] . '" alt="">
                <div class="team-text">
                    <div class="team-title">
                        <h5>' . $data["namaproduk"] . '</h5>
                        <span>' . $data['namakategori'] . '</span>
                        <span>Rp ' . number_format($data['hargaproduk']) . '</span>
                    </div>
                    <div class="team-social">
                        <a href="'.  BASEURL.' /home/detail/' . $data['idproduk'] . '" class="btn btn-primary rounded-pill py-3 px-5 w-100">Pesan</a>
                    </div>
                </div>
            </div>
        </div>';
                }
                ?>
            <?php endif ?>
        </div>
    </div>
</div>