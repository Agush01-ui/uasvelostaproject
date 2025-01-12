<div class="container-fluid page-header py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center pt-5 pb-3">
        <h1 class="display-4 text-white animated slideInDown mb-3">Checkout</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="<?= BASEURL ?>">Home</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="text-primary text-uppercase mb-2">Checkout</p>
            <h1 class="display-6 mb-4">Keranjang Belanja Anda</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <table class="table">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Produk</th>
                            <th>Ukuran</th>
                            <th>Berat (*g)</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>SubBerat (*g)</th>
                            <th>SubHarga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($produk)): ?>
                            <?php $nomor = 1; ?>
                            <?php foreach ($produk as $item): ?>
                                <tr class="text-center">
                                    <td><?= $nomor++ ?></td>
                                    <td><?= $item['namaproduk'] ?></td>
                                    <td><?= $item['ukuran'] ?></td>
                                    <td><?= $item['beratproduk'] ?></td>
                                    <td>Rp <?= number_format($item['hargaproduk'], 0, ',', '.') ?></td>
                                    <td><?= $item['jumlah'] ?></td>
                                    <td><?= $item['subberat'] ?></td>
                                    <td>Rp <?= number_format($item['subharga'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Keranjang belanja Anda kosong</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl">
    <div class="container">
        <div class="row g-0 justify-content-center">
            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                <form method="post" action="<?= BASEURL ?>/home/docheckout">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-2">Nama Pelanggan</label>
                                <input type="text" readonly value="<?php echo $_SESSION["pengguna"]['nama'] ?>" class="form-control mb-2" name="namapelanggan">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">No. Handphone Pelanggan</label>
                                <input type="text" readonly value="<?php echo $_SESSION["pengguna"]['telepon'] ?>" class="form-control mb-2">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Alamat Lengkap Pengiriman</label>
                                <input type="hidden" name="totalberatnya" value="<?php echo $berat ?>" required>
                                <textarea class="form-control mb-2" name="alamatpengiriman" placeholder="Masukkan Alamat"><?php echo $_SESSION["pengguna"]['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- <input type="hidden" name="total_berat" value="1"> -->
                                    <input type="hidden" name="provinsi">
                                    <input type="hidden" name="distrik">
                                    <input type="hidden" name="tipe">
                                    <input type="hidden" name="kodepos">
                                    <input type="hidden" name="ekspedisi">
                                    <input type="hidden" name="paket">
                                    <input type="hidden" name="ongkir" id="ongkir">
                                    <input type="hidden" name="estimasi">
                                    <div class="col-md-6 form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control" name="nama_provinsi">

                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Kota</label>
                                        <select class="form-control" name="nama_distrik">

                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group  mt-2">
                                        <div class="form-group">
                                            <label>Pilih Metode Pengiriman</label>
                                            <select name="metodepengiriman" id="metodepengiriman" class="form-control" onchange="handlemetodepengiriman()" required>
                                                <option value="">Pilih</option>
                                                <option value="Reguler">Reguler</option>
                                                <option value="Same Day">Same Day - 6 Jam</option>
                                                <option value="Instant">Instant - 2 Jam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="tampil" id="tampil" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 form-group  mt-2">
                                            <label>Ekspedisi</label>
                                            <select class="form-control" name="nama_ekspedisi" id="ekspedisi1">
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group  mt-2">
                                            <label>Layanan</label>
                                            <select class="form-control" name="nama_paket" id="layanan1">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tampil2" id="tampil2" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12 form-group mt-2">
                                            <label>Ekspedisi </label>
                                            <select class="form-control" name="nama_ekspedisi2" id="ekspedisi2">
                                                <option value="Gojek">Gojek</option>
                                                <option value="Grab">Grab</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" id="totalbelanja" name="totalbelanja" value="<?php echo $totalbelanja ?>" required>
                            <div class="col-md-12 form-group p_star">
                                <label>Total Belanja</label>
                                <input class="form-control valid mb-3" type="number" readonly required value="<?= $totalbelanja ?>">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Total Berat (*g)</label>
                                <input class="form-control mb-2" name="berat" type="number" value="<?= $totalberat ?>" readonly required id="berat">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Ongkir Pengiriman</label>
                                <input class="form-control mb-2" name="ongkir" type="number" value="0" readonly required id="ongkir">
                            </div>
                            <div class="form-group">
                                <label class="mb-2">Grandtotal</label>
                                <input class="form-control mb-2" id="grandtotal" value="<?= $totalbelanja ?>" required readonly type="number">
                            </div>

                            <button class="btn btn-primary pull-right w-100 mt-4" name="checkout">Selesaikan Pembayaran</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?= $this->view('home/layout/footer') ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            type: 'post',
            url: '<?= BASEURL ?>/home/dataprovinsi',
            success: function(hasil_provinsi) {
                $("select[name=nama_provinsi]").html(hasil_provinsi);
            }
        });

        $("select[name=nama_provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: 'post',
                url: '<?= BASEURL ?>/home/datadistrik',
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_distrik) {
                    $("select[name=nama_distrik]").html(hasil_distrik);
                }
            });
        });
        $.ajax({
            type: 'post',
            url: '<?= BASEURL ?>/home/dataekspedisi',
            success: function(hasil_ekspedisi) {
                $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
            }
        });

        $("select[name=nama_ekspedisi]").on("change", function() {
            //dapetin data ongkir

            //dapetin ekspedisi terpilih
            var ekpedisi_terpilih = $("select[name=nama_ekspedisi]").val();
            //dapetin id_distrik yg dipilih pengguna
            var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
            //dapetin total berat dari inputan
            var total_berat = $("input[name=totalberatnya]").val();
            $.ajax({
                type: 'post',
                url: '<?= BASEURL ?>/home/datapaket',
                data: 'ekspedisi=' + ekpedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    console.log(hasil_paket);
                    $("select[name=nama_paket]").html(hasil_paket);

                    //taro ekspedisi terpilih di inputan ekspedisi
                    $("input[name=ekspedisi]").val(ekpedisi_terpilih);
                }
            })
        });
        $("select[name=nama_distrik]").on("change", function() {
            var prov = $("option:selected", this).attr("nama_provinsi");
            var dist = $("option:selected", this).attr("nama_distrik");
            var tipe = $("option:selected", this).attr("tipe_distrik");
            var kodepos = $("option:selected", this).attr("kodepos");

            $("input[name=provinsi]").val(prov);
            $("input[name=distrik]").val(dist);
            $("input[name=tipe]").val(tipe);
            $("input[name=kodepos]").val(kodepos);
        });
        $("select[name=nama_paket]").on("change", function() {
            var paket = $("option:selected", this).attr("paket");
            var ongkir = $("option:selected", this).attr("ongkir");
            var etd = $("option:selected", this).attr("etd");

            $("input[name=paket]").val(paket);
            $("input[name=ongkir]").val(ongkir);
            $("input[name=estimasi]").val(etd);
            var num2 = document.getElementById("totalbelanja").value;
            result = parseInt(ongkir) + parseInt(num2);
            document.getElementById("grandtotal").value = result;
        })
    });
</script>

<script>
    function handlemetodepengiriman() {
        var metodepengiriman = document.getElementById("metodepengiriman").value;
        var tampilDiv = document.getElementById("tampil");
        var tampilDiv2 = document.getElementById("tampil2");

        if (metodepengiriman == "Same Day" || metodepengiriman == "Instant") {
            tampilDiv.style.display = "none";
            tampilDiv2.style.display = "block";

            document.getElementById("ekspedisi1").removeAttribute("required");
            document.getElementById("layanan1").removeAttribute("required");
            document.getElementById("ekspedisi2").setAttribute("required", true);
        } else if (metodepengiriman == "Reguler") {
            tampilDiv.style.display = "block";
            tampilDiv2.style.display = "none";
            document.getElementById("ekspedisi1").setAttribute("required", true);
            document.getElementById("layanan1").setAttribute("required", true);
            document.getElementById("ekspedisi2").removeAttribute("required");
        } else {
            tampilDiv.style.display = "none";
            tampilDiv2.style.display = "none";
            document.getElementById("ekspedisi1").removeAttribute("required");
            document.getElementById("layanan1").removeAttribute("required");
            document.getElementById("ekspedisi2").removeAttribute("required");
            // document.getElementById("prov").setAttribute("required", true);
            // document.getElementById("kota").setAttribute("required", true);
            // document.getElementById("Virtual Account").setAttribute("required", true);
            // document.getElementById("layanan").setAttribute("required", true);
            // document.getElementById("ongkir").setAttribute("required", true);

        }
    }
</script>