<?php
class Home extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function getModel()
    {
        return $this->model;
    }

    public function index()
    {
        $produkModel = $this->model('Produk');
        $kategoriModel = $this->model('Kategori');
        $produk = $produkModel->getProdukLimit();
        $kategori = $kategoriModel->getKategori();
        $data = [
            'produk' => $produk,
            'kategori' => $kategori
        ];

        // var_dump($kategori);
        $this->view('home/layout/header', $data);
        $this->view('home/index', $data);
        $this->view('home/layout/footer');
    }

    public function login()
    {
        $this->view('home/login');
    }

    public function dologin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            // Query untuk cek akun berdasarkan email
            $query = "SELECT * FROM pengguna WHERE email = '$email' LIMIT 1";
            $result = $this->model->query($query);

            if ($result->num_rows == 1) {
                $akun = $result->fetch_assoc();

                if (($password === $akun['password'])) {
                    if ($akun['level'] == 'Pelanggan') {
                        $_SESSION["pengguna"] = $akun;
                        echo "<script>alert('Anda sukses login');</script>";
                        echo "<script>location = '" . BASEURL . "/home/index';</script>";
                    } elseif ($akun['level'] == 'Admin' || $akun['level'] == 'Pemilik') {
                        $_SESSION['admin'] = $akun;
                        echo "<script>alert('Anda sukses login');</script>";
                        echo "<script>location = '" . BASEURL . "/admin/index';</script>";
                    }
                } else {
                    echo "<script>alert('Password Anda salah');</script>";
                    echo "<script>location = '" . BASEURL . "/home/login';</script>";
                }
            } else {
                echo "<script>alert('Akun tidak ditemukan');</script>";
                echo "<script>location = '" . BASEURL . "/home/login';</script>";
            }
        } else {
            header('Location: ' . BASEURL . '/home/login');
            exit();
        }
    }

    public function daftar()
    {
        $kategoriModel = $this->model('Kategori');
        $kategori = $kategoriModel->getKategori();
        $data = [
            'kategori' => $kategori
        ];
        $this->view('home/layout/header', $data);
        $this->view('home/daftar', $data); // View form daftar
        $this->view('home/layout/footer');
    }

    public function dodaftar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['nama']);
            $email = htmlspecialchars($_POST['email']);
            $password = ($_POST['password']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $telepon = htmlspecialchars($_POST['telepon']);

            $queryCekEmail = "SELECT * FROM pengguna WHERE email = '$email'";
            $resultCekEmail = $this->model->query($queryCekEmail);

            if ($resultCekEmail->num_rows > 0) {
                echo "<script>alert('Pendaftaran Gagal, email sudah ada');</script>";
                echo "<script>location='" . BASEURL . "/home/daftar';</script>";
            } else {
                // Insert data pengguna baru
                $queryInsert = "INSERT INTO pengguna 
                (nama, email, password, alamat, telepon, fotoprofil, level) 
                VALUES 
                ('$nama', '$email', '$password', '$alamat', '$telepon', 'Untitled.png', 'Pelanggan')";

                if ($this->model->query($queryInsert)) {
                    echo "<script>alert('Pendaftaran Berhasil');</script>";
                    echo "<script>location='" . BASEURL . "/home/login';</script>";
                } else {
                    echo "<script>alert('Pendaftaran Gagal');</script>";
                    echo "<script>location='" . BASEURL . "/home/daftar';</script>";
                }
            }
        } else {
            header('Location: ' . BASEURL . '/home/daftar');
            exit();
        }
    }
    public function akun()
    {
        $kategoriModel = $this->model('Kategori');
        $kategori = $kategoriModel->getKategori();

        $id_pengguna = $_SESSION["pengguna"]['id'];
        $akun = $this->model->query("SELECT * FROM pengguna WHERE id = '$id_pengguna'")->fetch_assoc();

        $data = [
            'akun' => $akun,
            'kategori' => $kategori
        ];

        $this->view('home/layout/header', $data);
        $this->view('home/akun', $data);
        $this->view('home/layout/footer');
    }

    public function akunsimpan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_pengguna = $_SESSION["pengguna"]['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];
            $password = $_POST['password'];

            if (empty($password)) {
                $this->model->query("UPDATE pengguna SET 
                nama = '$nama', 
                email = '$email', 
                telepon = '$telepon', 
                alamat = '$alamat' 
                WHERE id = '$id_pengguna'");
            } else {
                $this->model->query("UPDATE pengguna SET 
                nama = '$nama', 
                email = '$email', 
                telepon = '$telepon', 
                alamat = '$alamat', 
                password = '$password' 
                WHERE id = '$id_pengguna'");
            }

            echo "<script>alert('Profil berhasil diubah');</script>";
            echo "<script>location='" . BASEURL . "/home/akun';</script>";
        }
    }


    public function produk()
    {
        $produkModel = $this->model('Produk');
        $kategoriModel = $this->model('Kategori');
        $produk = $produkModel->getProduk();
        $kategori = $kategoriModel->getKategori();
        $data = [
            'produk' => $produk,
            'kategori' => $kategori
        ];

        $this->view('home/layout/header', $data);
        $this->view('home/produk', $data);
        $this->view('home/layout/footer');
    }

    public function kategori($id)
    {
        $kategoriModel = $this->model('Kategori');
        $kategori = $kategoriModel->getKategori();
        $kategoridata = $this->model->query("SELECT * FROM kategori WHERE idkategori = '$id'")->fetch_assoc();
        $produk = $this->model->query("SELECT * FROM produk WHERE idkategori = '$id'")->fetch_all(MYSQLI_ASSOC);
        $data = [
            'produk' => $produk,
            'kategori' => $kategori,
            'kategoridata' => $kategoridata
        ];

        $this->view('home/layout/header', $data);
        $this->view('home/kategori', $data);
        $this->view('home/layout/footer');
    }

    public function detail($id)
    {
        $kategoriModel = $this->model('Kategori');
        $kategori = $kategoriModel->getKategori();
        $produkModel = $this->model('Produk');
        $produk = $produkModel->getProdukById($id);
        $data = [
            'detail' => $produk,
            'kategori' => $kategori
        ];

        $this->view('home/layout/header', $data);
        $this->view('home/detail', $data);
        $this->view('home/layout/footer');
    }

    public function beli()
    {
        if (!isset($_SESSION["pengguna"])) {
            header("Location: " . BASEURL . "/home/login");
            exit();
        }
        if (isset($_POST["beli"])) {
            $idproduk = $_POST["idproduk"];
            $jumlah = $_POST["jumlah"];
            $produkModel = $this->model('Produk');
            $produk = $produkModel->getProdukById($idproduk);

            if ($produk) {
                if ($jumlah <= $produk["stokproduk"]) {
                    $_SESSION["keranjang"][$idproduk] = $jumlah;
                    echo "<script> alert('Produk masuk ke keranjang');</script>";
                    echo "<script> location ='" . BASEURL . "/home/keranjang';</script>";
                } else {
                    echo "<script> alert('Stok produk tidak cukup');</script>";
                }
            } else {
                echo "<script> alert('Produk tidak ditemukan');</script>";
            }
        }
    }

    public function keranjang()
    {
        if (!isset($_SESSION["pengguna"])) {
            header("Location: " . BASEURL . "/login");
            exit();
        }
        $kategoriModel = $this->model('Kategori');
        $kategori = $kategoriModel->getKategori();

        $keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];

        $produkModel = $this->model('Produk');
        $produkList = [];

        foreach ($keranjang as $idproduk => $jumlah) {
            $produk = $produkModel->getProdukById($idproduk);
            if ($produk) {
                $produk['jumlah'] = $jumlah;
                $produk['totalharga'] = $produk['hargaproduk'] * $jumlah;
                $produkList[] = $produk;
            }
        }

        $data = [
            'keranjang' => $produkList,
            'kategori' => $kategori
        ];

        // Tampilkan halaman keranjang
        $this->view('home/layout/header', $data);
        $this->view('home/keranjang', $data);
        $this->view('home/layout/footer');
    }

    public function keranjanghapus($idproduk)
    {
        if (isset($_SESSION['keranjang'][$idproduk])) {
            unset($_SESSION['keranjang'][$idproduk]);
        }
        header("Location: " . BASEURL . "/home/keranjang");
        exit();
    }

    public function checkout()
    {
        // Memeriksa apakah pengguna sudah login
        if (!isset($_SESSION["pengguna"])) {
            echo "<script>alert('Silakan login terlebih dahulu');</script>";
            echo "<script>location = '" . BASEURL . "/home/login';</script>";
            exit;
        }

        // Mendapatkan data keranjang dari sesi
        if (!isset($_SESSION["keranjang"]) || empty($_SESSION["keranjang"])) {
            echo "<script>alert('Keranjang belanja kosong');</script>";
            echo "<script>location = '" . BASEURL . "/home/produk';</script>";
            exit;
        }

        $data['title'] = "Checkout";
        $data['keranjang'] = $_SESSION["keranjang"];

        // Mengambil data produk dari database berdasarkan ID produk di keranjang
        $data['produk'] = [];
        $data['totalbelanja'] = 0;
        $data['totalberat'] = 0;

        foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) {
            $produk = $this->model('Produk')->getProdukById($idproduk);

            if ($produk) {
                $produk['jumlah'] = $jumlah;
                $produk['subharga'] = $produk['hargaproduk'] * $jumlah;
                $produk['subberat'] = $produk['beratproduk'] * $jumlah;

                $data['produk'][] = $produk;
                $data['totalbelanja'] += $produk['subharga'];
                $data['totalberat'] += $produk['subberat'];
            }
        }

        $data['kategori'] =  $this->model('Kategori')->getKategori();
        $data['berat'] = $data['totalberat'] / 1000;
        $this->view('home/layout/header', $data);
        $this->view('home/checkout', $data);
        // $this->view('home/layout/footer');
    }

    public function docheckout()
    {
        if (isset($_POST["checkout"])) {
            // Membuat kode transaksi unik
            $notransaksi = '#INV-' . date("Ymdhis");
            $id = $_SESSION["pengguna"]["id"];
            $tanggalbeli = date("Y-m-d");
            $waktu = date("Y-m-d H:i:s");
            $alamatpengiriman = $_POST["alamatpengiriman"];
            $totalbeli = $_POST['totalbelanja'];
            $totalberatnya = $_POST["totalberatnya"];
            $ongkir = $_POST["ongkir"];
            $kota = $_POST["nama_distrik"];
            $provinsi = $_POST["nama_provinsi"];
            $totalberat = $_POST["berat"];
            $metodepengiriman = $_POST['metodepengiriman'];

            // Insert data pemesanan berdasarkan metode pengiriman
            if ($metodepengiriman == 'Reguler') {
                $ekspedisi = strtoupper($_POST["nama_ekspedisi"]);
                $layanan = $_POST["nama_paket"];

                // Insert pemesanan
                $query = "INSERT INTO pemesanan(notransaksi, id, tanggalbeli, totalbeli, alamatpengiriman, totalberat, kota, provinsi, ekspedisi, layanan, ongkir, statusbeli, waktu, metodepengiriman)
                VALUES('$notransaksi', '$id', '$tanggalbeli', '$totalbeli', '$alamatpengiriman', '$totalberat', '$kota', '$provinsi', '$ekspedisi', '$layanan', '$ongkir', 'Belum Bayar', '$waktu', '$metodepengiriman')";

                if (!$this->model->query($query)) {
                    die('Error: ' . mysqli_error($this->model->getDb()));
                }

                $idpenjualan_barusan = $this->model->getDb()->insert_id;

                // Insert detail produk yang dibeli
                foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) {
                    $ambil = $this->model->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
                    if (!$ambil) {
                        die('Error: ' . mysqli_error($this->model->getDb()));
                    }

                    $perproduk = $ambil->fetch_assoc();
                    $nama = $perproduk['namaproduk'];
                    $harga = $perproduk['hargaproduk'];
                    $subharga = $harga * $jumlah;

                    // Update stok produk
                    $stok_sekarang = $perproduk['stokproduk'] - $jumlah;
                    $updateStokQuery = "UPDATE produk SET stokproduk='$stok_sekarang' WHERE idproduk='$idproduk'";
                    if (!$this->model->query($updateStokQuery)) {
                        die('Error: ' . mysqli_error($this->model->getDb()));
                    }

                    // Insert ke tabel penjualan
                    $penjualanQuery = "INSERT INTO penjualan (idpenjualan, idproduk, nama, harga, subharga, jumlah)
                    VALUES ('$idpenjualan_barusan', '$idproduk', '$nama', '$harga', '$subharga', '$jumlah')";

                    if (!$this->model->query($penjualanQuery)) {
                        die('Error: ' . mysqli_error($this->model->getDb()));
                    }
                }
            } else {
                $ekspedisi = strtoupper($_POST["nama_ekspedisi2"]);
                $layanan = $_POST["nama_ekspedisi2"];
                $ongkir = 0;

                // Insert pemesanan
                $query = "INSERT INTO pemesanan(notransaksi, id, tanggalbeli, totalbeli, alamatpengiriman, totalberat, kota, provinsi, ekspedisi, layanan, ongkir, statusbeli, waktu, metodepengiriman)
                VALUES('$notransaksi', '$id', '$tanggalbeli', '$totalbeli', '$alamatpengiriman', '$totalberat', '$kota', '$provinsi', '$ekspedisi', '$layanan', '$ongkir', 'Belum di Konfirmasi', '$waktu', '$metodepengiriman')";

                if (!$this->model->query($query)) {
                    die('Error: ' . mysqli_error($this->model->getDb()));
                }

                $idpenjualan_barusan = $this->model->getDb()->insert_id;

                // Insert detail produk yang dibeli
                foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) {
                    $ambil = $this->model->query("SELECT * FROM produk WHERE idproduk='$idproduk'");
                    if (!$ambil) {
                        die('Error: ' . mysqli_error($this->model->getDb()));
                    }

                    $perproduk = $ambil->fetch_assoc();
                    $nama = $perproduk['namaproduk'];
                    $harga = $perproduk['hargaproduk'];

                    // Update stok produk
                    $stok_sekarang = $perproduk['stokproduk'] - $jumlah;
                    $updateStokQuery = "UPDATE produk SET stokproduk='$stok_sekarang' WHERE idproduk='$idproduk'";
                    if (!$this->model->query($updateStokQuery)) {
                        die('Error: ' . mysqli_error($this->model->getDb()));
                    }

                    $subharga = $harga * $jumlah;

                    // Insert ke tabel penjualan
                    $penjualanQuery = "INSERT INTO penjualan (idpenjualan, idproduk, nama, harga, subharga, jumlah)
                    VALUES ('$idpenjualan_barusan', '$idproduk', '$nama', '$harga', '$subharga', '$jumlah')";

                    if (!$this->model->query($penjualanQuery)) {
                        die('Error: ' . mysqli_error($this->model->getDb()));
                    }
                }
            }

            unset($_SESSION["keranjang"]);

            echo "<script> alert('Pembelian Sukses');</script>";
            echo "<script>location = '" . BASEURL . "/home/riwayat';</script>";
        }
    }

    public function riwayat()
    {
        $id = $_SESSION["pengguna"]['id'];

        $query = "SELECT *, pemesanan.idpenjualan AS idpenjualanreal 
              FROM pemesanan 
              LEFT JOIN pembayaran ON pemesanan.idpenjualan = pembayaran.idpenjualan 
              WHERE pemesanan.id = '$id' 
              ORDER BY pemesanan.tanggalbeli DESC, pemesanan.idpenjualan DESC";

        $result = $this->model->query($query);
        $data['riwayat'] = $result;
        $data['kategori'] =  $this->model('Kategori')->getKategori();

        $this->view('home/layout/header', $data);
        $this->view('home/riwayat', $data);
        $this->view('home/layout/footer');
    }

    public function pembayaran($id)
    {
        // Pastikan pengguna telah login
        if (!isset($_SESSION["pengguna"])) {
            header('Location: ' . BASEURL . '/home/login');
            exit();
        }

        $id_pengguna = $_SESSION["pengguna"]['id'];
        $queryPemesanan = "SELECT * FROM pemesanan LEFT JOIN pengguna ON pemesanan.id=pengguna.id WHERE pemesanan.idpenjualan = '$id'";
        $resultPemesanan = $this->model->query($queryPemesanan);

        if ($resultPemesanan->num_rows == 0) {
            header('Location: ' . BASEURL . '/home/riwayat');
            exit();
        }

        $pemesanan = $resultPemesanan->fetch_assoc();

        // Query untuk mendapatkan detail produk dalam pemesanan
        $queryProduk = "SELECT * FROM penjualan WHERE idpenjualan = '$id'";
        $resultProduk = $this->model->query($queryProduk);

        $produk = [];
        while ($row = $resultProduk->fetch_assoc()) {
            $produk[] = $row;
        }

        $data['kategori'] =  $this->model('Kategori')->getKategori();
        $data['pemesanan'] = $pemesanan;
        $data['produk'] = $produk;

        // Tampilkan halaman pembayaran
        $this->view('home/layout/header', $data);
        $this->view('home/pembayaran', $data);
        $this->view('home/layout/footer');
    }

    public function pembayaransimpan($idpenjualan)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $namabukti = $_FILES['bukti']['name'];
            $lokasibukti = $_FILES['bukti']['tmp_name'];
            $namafix = date('YmdHis') . '_' . $namabukti;


            if (move_uploaded_file($lokasibukti, "foto/$namafix")) {
                $nama = $_POST['nama'];
                $tanggaltransfer = $_POST['tanggaltransfer'];
                $tanggal = date('Y-m-d');

                $query1 = "INSERT INTO pembayaran (idpenjualan, nama, tanggaltransfer, tanggal, bukti) 
                       VALUES ('$idpenjualan', '$nama', '$tanggaltransfer', '$tanggal', '$namafix')";
                $query2 = "UPDATE pemesanan 
                       SET statusbeli = 'Sudah Upload Bukti Pembayaran' 
                       WHERE idpenjualan = '$idpenjualan'";

                if ($this->model->query($query1) && $this->model->query($query2)) {
                    echo "<script>alert('Terima kasih, bukti pembayaran telah diunggah.');</script>";
                    echo "<script>location='" . BASEURL . "/home/riwayat';</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan, silakan coba lagi.');</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah file bukti pembayaran.');</script>";
            }
        } else {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function notacetak($id)
    {

        $query = "SELECT*FROM pemesanan JOIN pengguna ON pemesanan.id=pengguna.id WHERE pemesanan.idpenjualan = '$id'";
        $result = $this->model->query($query);
        $pemesanan = $result->fetch_assoc();

        $data['pecah'] = $pemesanan;

        $this->view('home/notacetak', $data);
    }

    public function dataprovinsi()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e5d496b6b2b47102d8e64c69541abc30"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //dapet bentuknya json
            //konversi ke array dulu yak
            $array_response = json_decode($response, TRUE);
            $dataprovinsi = $array_response["rajaongkir"]["results"];

            echo "<option value''>--Pilih Provinsi--</option>";

            foreach ($dataprovinsi as $key => $tiap_provinsi) {
                echo "<option value='" . $tiap_provinsi["province"] . "' id_provinsi='" . $tiap_provinsi["province_id"] . "' >";
                echo $tiap_provinsi["province"];
                echo "</option>";
            }
        }
    }

    public function datadistrik()
    {
        $id_provinsi_terpilih = $_POST["id_provinsi"];
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: e5d496b6b2b47102d8e64c69541abc30"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, TRUE);
            $data_distrik = $array_response["rajaongkir"]["results"];


            echo "<option value=''>--Pilih Distrik--</option>";

            foreach ($data_distrik as $key => $tiap_distrik) {
                echo "<option value='" . $tiap_distrik["city_name"] . "' 
                    id_distrik='" . $tiap_distrik["city_id"] . "'
                    nama_provinsi='" . $tiap_distrik["province"] . "' 
                    nama_distrik='" . $tiap_distrik["city_name"] . "' 
                    tipe_distrik='" . $tiap_distrik["type"] . "' 
                    kodepos='" . $tiap_distrik["postal_code"] . "'		>";
                echo $tiap_distrik["type"] . " ";
                echo $tiap_distrik["city_name"];
                echo "</option>";
            }
        }
    }

    public function dataekspedisi()
    {
        echo "<option value=''>--Ekspedisi--</option>
          <option value='jne'>JNE</option>
          <option value='pos'>POS</option>
          <option value='tiki'>TIKI</option>";
    }

    public function datapaket()
    {
        $ekspedisi = $_POST['ekspedisi'];
        $distrik = $_POST['distrik'];
        $berat = $_POST['berat'] * 1000;
        // $berat = 2000;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=327&destination=" . $distrik . "&weight=" . $berat . "&courier=" . $ekspedisi,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: e5d496b6b2b47102d8e64c69541abc30"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
            $array_response = json_decode($response, TRUE);

            $paket = $array_response["rajaongkir"]["results"]["0"]["costs"];
            //echo "<pre>";
            //print_r($paket);
            //echo "</pre>";

            echo "<option value=''>--Pilih Layanan</option>";

            foreach ($paket as $key => $tiap_paket) {
                echo "<option 
                        paket='" . $tiap_paket['service'] . "'
                        ongkir='" . $tiap_paket["cost"]["0"]["value"] . "'
                        etd='" . $tiap_paket["cost"]["0"]["etd"] . "' >";
                echo $tiap_paket["service"] . " ";
                echo number_format($tiap_paket["cost"]["0"]["value"]) . " ";
                echo $tiap_paket["cost"]["0"]["etd"];
                echo "</option>";
            }
        }
    }

    public function logout()
    {
        session_destroy();

        echo "<script>alert('Anda telah logout');</script>";
        echo "<script>window.location='" . BASEURL . "/';</script>";
    }

}
