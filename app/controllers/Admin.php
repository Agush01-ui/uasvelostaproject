<?php
class Admin extends Controller
{

    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "velostadb");
    }

    public function getDb()
    {
        return $this->db;
    }

    public function index()
    {
        $jumlahkategori = $this->db->query("SELECT * FROM kategori")->num_rows;
        $jumlahproduk = $this->db->query("SELECT * FROM produk")->num_rows;
        $jumlahmember = $this->db->query("SELECT * FROM pengguna WHERE level = 'Pelanggan'")->num_rows;
        $jumlahpemesanan = $this->db->query("SELECT * FROM pemesanan")->num_rows;


        $data = [
            'jumlahkategori' => $jumlahkategori,
            'jumlahproduk' => $jumlahproduk,
            'jumlahmember' => $jumlahmember,
            'jumlahpemesanan' => $jumlahpemesanan,
        ];

        // var_dump($kategori);
        $this->view('admin/layout/header', $data);
        $this->view('admin/index', $data);
        $this->view('admin/layout/footer');
    }

    public function kategoridaftar()
    {
        $result = $this->db->query("SELECT * FROM kategori");

        $kategori = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $kategori[] = $row;
            }
        }

        $data = [
            'kategori' => $kategori,
        ];

        // Memuat view
        $this->view('admin/layout/header', $data);
        $this->view('admin/kategoridaftar', $data);
        $this->view('admin/layout/footer');
    }


    public function kategoritambah()
    {

        // Memuat view
        $this->view('admin/layout/header');
        $this->view('admin/kategoritambah');
        $this->view('admin/layout/footer');
    }
    public function kategoritambahsimpan()
    {
        if (isset($_POST['tambah'])) {
            $kategori = $_POST['kategori'];

            // Menambahkan kategori baru ke dalam database
            $query = "INSERT INTO kategori (namakategori) VALUES ('$kategori')";
            $this->db->query($query);

            // Redirect ke halaman daftar kategori setelah berhasil
            echo "<script>alert('Kategori berhasil ditambahkan');</script>";
            echo "<script>window.location='" . BASEURL . "/admin/kategoridaftar';</script>";
        }
    }


    public function kategoriedit($id)
    {
        $query = "SELECT * FROM kategori WHERE idkategori = '$id'";
        $result = $this->db->query($query);
        $kategori = $result->fetch_assoc();

        $data['kategori'] = $kategori;

        // Menampilkan tampilan edit kategori
        $this->view('admin/layout/header');
        $this->view('admin/kategoriedit', $data);
        $this->view('admin/layout/footer');
    }

    public function kategorieditsimpan()
    {
        if (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $kategori = $_POST['kategori'];

            // Mengupdate data kategori di dalam database
            $query = "UPDATE kategori SET namakategori = '$kategori' WHERE idkategori = '$id'";
            $this->db->query($query);

            // Redirect ke halaman daftar kategori setelah berhasil
            echo "<script>alert('Kategori berhasil diedit');</script>";
            echo "<script>window.location='" . BASEURL . "/admin/kategoridaftar';</script>";
        }
    }

    public function kategorihapus($id)
    {

        $query = "DELETE FROM kategori WHERE idkategori = '$id'";
        $this->db->query($query);

        // Redirect ke halaman daftar kategori setelah berhasil
        echo "<script>alert('Kategori berhasil dihapus');</script>";
        echo "<script>window.location='" . BASEURL . "/admin/kategoridaftar';</script>";
    }

    public function produkdaftar()
    {
        $query = "SELECT * FROM produk LEFT JOIN kategori ON produk.idkategori = kategori.idkategori";
        $result = $this->db->query($query);
        $produk = [];
        while ($data = $result->fetch_assoc()) {
            $produk[] = $data;
        }

        $data['produk'] = $produk;

        // Menampilkan tampilan produk daftar
        $this->view('admin/layout/header');
        $this->view('admin/produkdaftar', $data);
        $this->view('admin/layout/footer');
    }
    public function produktambah()
    {
        $datakategori = [];
        $ambil = $this->db->query("SELECT * FROM kategori");
        while ($tiap = $ambil->fetch_assoc()) {
            $datakategori[] = $tiap; // Menyimpan data kategori dalam array
        }

        $data['datakategori'] = $datakategori;

        // Menampilkan halaman tambah produk
        $this->view('admin/layout/header');
        $this->view('admin/produktambah', $data); // Ganti dengan nama view yang sesuai
        $this->view('admin/layout/footer');
    }

    public function produktambahsimpan()
    {
        if (isset($_POST['save'])) {
            // Ambil data dari form
            $namaproduk = $_POST['nama'];
            $idkategori = $_POST['idkategori'];
            $hargaproduk = $_POST['harga'];
            $beratproduk = $_POST['berat'];
            $deskripsiproduk = $_POST['deskripsi'];
            $stokproduk = $_POST['stok'];

            // Proses upload foto
            $namafoto = $_FILES['foto']['name'];
            $lokasifoto = $_FILES['foto']['tmp_name'];
            $foto_path = "../public/foto/"  . $namafoto;

            // Pastikan foto berhasil diupload
            if (move_uploaded_file($lokasifoto, $foto_path)) {
                // Query untuk memasukkan data produk ke dalam database
                $query = "INSERT INTO produk
                (namaproduk, idkategori, hargaproduk, beratproduk, fotoproduk, deskripsiproduk, stokproduk)
                VALUES ('$namaproduk', '$idkategori', '$hargaproduk', '$beratproduk', '$namafoto', '$deskripsiproduk', '$stokproduk')";

                // Eksekusi query
                $result = $this->db->query($query);

                if ($result) {
                    // Jika berhasil, tampilkan pesan dan arahkan ke halaman produk
                    echo "<script>alert('Produk Berhasil Disimpan');</script>";
                    echo "<script>location = '" . BASEURL . "/admin/produkdaftar';</script>";
                } else {
                    // Jika gagal, tampilkan pesan error
                    echo "<script>alert('Gagal menyimpan produk. Silakan coba lagi.');</script>";
                }
            } else {
                echo "<script>alert('Gagal meng-upload foto.');</script>";
            }
        }
    }

    public function produkedit($id)
    {
        $query = "SELECT * FROM produk WHERE idproduk = '$id'";
        $result = $this->db->query($query);
        $produk = $result->fetch_assoc();

        $data['produk'] = $produk;

        $datakategori = [];
        $ambil = $this->db->query("SELECT * FROM kategori");
        while ($tiap = $ambil->fetch_assoc()) {
            $datakategori[] = $tiap; // Menyimpan data kategori dalam array
        }

        $data['datakategori'] = $datakategori;

        // Menampilkan tampilan edit kategori
        $this->view('admin/layout/header');
        $this->view('admin/produkedit', $data);
        $this->view('admin/layout/footer');
    }

    public function produkeditsimpan()
    {
        if (isset($_POST['edit'])) {
            // Ambil data dari form
            $idproduk = $_POST['idproduk']; // ID produk untuk update
            $namaproduk = $_POST['nama'];
            $idkategori = $_POST['idkategori'];
            $hargaproduk = $_POST['harga'];
            $beratproduk = $_POST['berat'];
            $deskripsiproduk = $_POST['deskripsi'];
            $stokproduk = $_POST['stok'];

            // Mengambil foto yang lama (jika ada) untuk update
            $fotolama = $_POST['fotolama']; // Foto lama yang sudah ada di database

            // Cek apakah ada foto baru yang diupload
            if ($_FILES['foto']['name'] != "") {
                // Proses upload foto baru
                $namafoto = $_FILES['foto']['name'];
                $lokasifoto = $_FILES['foto']['tmp_name'];
                $foto_path = "../public/foto/" . $namafoto;

                // Pastikan foto berhasil diupload
                if (move_uploaded_file($lokasifoto, $foto_path)) {
                    // Jika foto berhasil diupload, hapus foto lama jika ada
                    if (file_exists("../public/foto/" . $fotolama)) {
                        unlink("../public/foto/" . $fotolama);
                    }
                } else {
                    echo "<script>alert('Gagal meng-upload foto baru.');</script>";
                    return;
                }
            } else {
                // Jika tidak ada foto baru, gunakan foto lama
                $namafoto = $fotolama;
            }

            // Query untuk memperbarui data produk
            $query = "UPDATE produk SET
            namaproduk = '$namaproduk',
            idkategori = '$idkategori',
            hargaproduk = '$hargaproduk',
            beratproduk = '$beratproduk',
            fotoproduk = '$namafoto',
            deskripsiproduk = '$deskripsiproduk',
            stokproduk = '$stokproduk'
            WHERE idproduk = '$idproduk'";

            // Eksekusi query
            $result = $this->db->query($query);

            if ($result) {
                // Jika berhasil, tampilkan pesan dan arahkan ke halaman produk
                echo "<script>alert('Produk Berhasil Diperbarui');</script>";
                echo "<script>location = '" . BASEURL . "/admin/produkdaftar';</script>";
            } else {
                // Jika gagal, tampilkan pesan error
                echo "<script>alert('Gagal memperbarui produk. Silakan coba lagi.');</script>";
            }
        }
    }
    public function produkhapus($id)
    {

        $query = "DELETE  FROM  produk  WHERE idproduk = '$id'";
        $this->db->query($query);

        echo "<script>alert('Produk berhasil dihapus');</script>";
        echo "<script>window.location='" . BASEURL . "/admin/produkdaftar';</script>";
    }

    public function pemesanan()
    {
        // Query untuk mengambil data pemesanan
        $query = "SELECT * FROM pemesanan JOIN pengguna ON pemesanan.id = pengguna.id ORDER BY pemesanan.tanggalbeli DESC, pemesanan.idpenjualan DESC";
        $result = $this->db->query($query);

        // Persiapkan data pemesanan
        $data['pemesanan'] = [];
        while ($row = $result->fetch_assoc()) {
            // Ambil produk yang terkait dengan pemesanan ini
            $idpenjualan = $row['idpenjualan'];
            $produkQuery = "SELECT * FROM penjualan JOIN produk ON penjualan.idproduk = produk.idproduk WHERE penjualan.idpenjualan = '$idpenjualan'";
            $produkResult = $this->db->query($produkQuery);

            $produkList = [];
            while ($produk = $produkResult->fetch_assoc()) {
                $produkList[] = $produk;
            }

            // Menambahkan daftar produk ke data pemesanan
            $row['produk'] = $produkList;

            // Menambahkan data pemesanan ke array
            $data['pemesanan'][] = $row;
        }

        // Menyediakan data untuk ditampilkan di view
        $this->view('admin/layout/header');
        $this->view('admin/pemesanan', $data);
        $this->view('admin/layout/footer');
    }


    public function pembayaran($id)
    {
        // Ambil data pemesanan berdasarkan idpenjualan
        $query = "SELECT * FROM pemesanan JOIN pengguna ON pemesanan.id = pengguna.id WHERE pemesanan.idpenjualan = '$id'";
        $result = $this->db->query($query);
        $detail = $result->fetch_assoc();

        // Ambil data produk yang dipesan
        $produkQuery = "SELECT * FROM penjualan JOIN produk ON penjualan.idproduk = produk.idproduk WHERE penjualan.idpenjualan = '$id'";
        $produkResult = $this->db->query($produkQuery);

        // Persiapkan data pemesanan
        $data['detail'] = $detail;
        $data['produk'] = [];
        while ($produk = $produkResult->fetch_assoc()) {
            $data['produk'][] = $produk;
        }

        // Ambil data pembayaran jika ada
        $pembayaranQuery = "SELECT * FROM pembayaran WHERE idpenjualan = '$id'";
        $pembayaranResult = $this->db->query($pembayaranQuery);
        $data['pembayaran'] = $pembayaranResult->fetch_assoc();

        // Mengembalikan data untuk digunakan di view

        $this->view('admin/layout/header');
        $this->view('admin/pembayaran', $data);
        $this->view('admin/layout/footer');
    }

    public function konfirmasisimpan($id)
    {
        if (isset($_POST["proses"])) {
            $resi = $_POST["resi"];
            $statusbeli = $_POST["statusbeli"];

            $statusSebelumnyaQuery =  $this->db->query("SELECT statusbeli FROM pemesanan WHERE idpenjualan='$id'");
            $dataStatusSebelumnya = $statusSebelumnyaQuery->fetch_assoc();
            $statusSebelumnya = $dataStatusSebelumnya['statusbeli'];

            $this->db->query("UPDATE pemesanan SET resipengiriman='$resi', statusbeli='$statusbeli' WHERE idpenjualan='$id'");

            if ($statusbeli == "Pesanan Di Tolak" && $statusSebelumnya != "Pesanan Di Tolak") {
                $produkQuery =  $this->db->query("SELECT * FROM penjualan WHERE idpenjualan='$id'");
                while ($data = $produkQuery->fetch_assoc()) {
                    $jumlah = $data['jumlah'];
                    $idproduk = $data['idproduk'];

                    $stokProdukQuery =  $this->db->query("SELECT stokproduk FROM produk WHERE idproduk='$idproduk'");
                    $dataStok = $stokProdukQuery->fetch_assoc();
                    $stokSaatIni = $dataStok['stokproduk'];

                    $stokBaru = $stokSaatIni + $jumlah;

                    $this->db->query("UPDATE produk SET stokproduk = '$stokBaru' WHERE idproduk='$idproduk'");
                }
            }

            echo "<script>alert('Status Transaksi Berhasil Diupdate')</script>";
            echo "<script>location='" . BASEURL . "/admin/pemesanan';</script>";
        }
    }

    public function laporan()
    {

        $hariIni = date('Y-m-d');
        $tanggalAwal = date('Y-m-01', strtotime($hariIni));
        $tanggalAkhir = date('Y-m-t', strtotime($hariIni));

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tanggalAwal = $_POST['tanggalawal'];
            $tanggalAkhir = $_POST['tanggalakhir'];
        }

        $query = "SELECT * FROM pemesanan 
              JOIN pengguna ON pemesanan.id = pengguna.id 
              WHERE waktu >= '$tanggalAwal' AND tanggalbeli <= '$tanggalAkhir' 
              ORDER BY idpenjualan DESC";
        $result = $this->db->query($query);

        $data['laporan'] = $result->fetch_all(MYSQLI_ASSOC);

        // Tambahkan tanggal untuk view
        $data['tanggalawal'] = $tanggalAwal;
        $data['tanggalakhir'] = $tanggalAkhir;

        // Tampilkan view
        $this->view('admin/layout/header');
        $this->view('admin/laporan', $data);
        $this->view('admin/layout/footer');
    }


    public function laporancetak()
    {

        $tanggalawal = $_GET['tanggalawal'] ?? date('Y-m-01');
        $tanggalakhir = $_GET['tanggalakhir'] ?? date('Y-m-t');

        // Query data laporan
        $query = "SELECT * FROM pemesanan 
              JOIN pengguna ON pemesanan.id = pengguna.id 
              WHERE waktu >= '$tanggalawal' AND tanggalbeli <= '$tanggalakhir' 
              ORDER BY idpenjualan DESC";
        $result = $this->db->query($query);
        $laporan = $result->fetch_all(MYSQLI_ASSOC);
        $data = [
            'laporan' => $laporan,
            'tanggalawal' => $tanggalawal,
            'tanggalakhir' => $tanggalakhir,
        ];
        $this->view('admin/laporancetak', $data);
    }

    public function penggunadaftar()
    {
        $query = "SELECT * FROM pengguna where level = 'Pelanggan'";
        $pengguna = $this->db->query($query);
        $data['pengguna'] = $pengguna->fetch_all(MYSQLI_ASSOC);

        $this->view('admin/layout/header');
        $this->view('admin/penggunadaftar', $data);
        $this->view('admin/layout/footer');

    }
    public function penggunahapus($id)
    {
        $query = "DELETE  FROM  pengguna  WHERE id = '$id'";
        $this->db->query($query);

        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location='" . BASEURL . "/admin/penggunadaftar';</script>";
    }
}
