<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Detail</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Detail</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-6">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row position-relative h-100">
                    <img style="height: 500px;object-fit: cover;" class="img-fluid rounded" src="<?= BASEURL ?>/foto/<?php echo $detail["fotoproduk"]; ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h3><?php echo $detail["namaproduk"] ?></h3>
                    <p class="price"><span>Rp. <?php echo number_format($detail["hargaproduk"]); ?></span></p>
                    <br>
                    <br>
                    <span style="color: #000;font-size:15pt !important;"><?php echo $detail["deskripsiproduk"]; ?></span>
                    <div class="row mt-4">
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;font-size:15pt !important;">Sisa Produk : <?php echo number_format($detail["stokproduk"]); ?></p>
                        </div>
                    </div>
                    <form method="post" action="<?= BASEURL ?>/home/beli">
                        <div class="form-group">
                            <input type="hidden" name="idproduk" value="<?= $detail['idproduk'] ?>">
                            <label>Beli Produk</label>
                            <input type="number" placeholder="Jumlah" min="1" class="form-control" name="jumlah" max="<?php echo number_format($detail["stokproduk"]); ?>" required></input>
                            <br>
                            <button class="btn btn-success float-right" name="beli"><i class="fa fa-shopping-cart"></i> Beli</button>
                        </div>
                    </form>
                   
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>