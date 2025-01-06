-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2025 pada 14.30
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velostadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `namakategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(16, 'TES 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `idpenjualan` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tanggaltransfer` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idpenjualan`, `nama`, `tanggaltransfer`, `tanggal`, `bukti`) VALUES
(12, 55, 'Sugeng', '2025-01-03', '2025-01-03 00:00:00', '20250103133148_seragam1.jpg'),
(13, 56, 'Sugeng', '2025-01-03', '2025-01-03 00:00:00', '20250103142855_mengenal-tahapan-bleaching-dalam-proses-pewarnaan-rambut-NAXtnLSObu.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpenjualan` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `id` int(11) NOT NULL,
  `tanggalbeli` date NOT NULL,
  `totalbeli` text NOT NULL,
  `alamatpengiriman` text NOT NULL,
  `metodepengiriman` text NOT NULL,
  `totalberat` varchar(255) NOT NULL,
  `kota` text NOT NULL,
  `provinsi` text NOT NULL,
  `ekspedisi` text NOT NULL,
  `layanan` text NOT NULL,
  `ongkir` text NOT NULL,
  `statusbeli` text NOT NULL,
  `resipengiriman` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpenjualan`, `notransaksi`, `id`, `tanggalbeli`, `totalbeli`, `alamatpengiriman`, `metodepengiriman`, `totalberat`, `kota`, `provinsi`, `ekspedisi`, `layanan`, `ongkir`, `statusbeli`, `resipengiriman`, `waktu`) VALUES
(55, '#INV-20250103125459', 20, '2025-01-03', '1900000', 'asd', 'Reguler', '1', 'Jakarta Pusat', 'DKI Jakarta', 'JNE', 'OKE 17,000 3-4', '17000', 'Barang Di Kemas', '', '2025-01-03 12:54:59'),
(56, '#INV-20250103022844', 20, '2025-01-03', '1900000', 'asd', 'Reguler', '1', 'Jakarta Selatan', 'DKI Jakarta', 'JNE', 'OKE 17,000 3-4', '17000', 'Barang Di Kirim', '', '2025-01-03 14:28:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `nama_provinsi` text NOT NULL,
  `nama_distrik` text NOT NULL,
  `fotoprofil` varchar(255) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `alamat`, `telepon`, `nama_provinsi`, `nama_distrik`, `fotoprofil`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', 'Palembang', '0812345678', '', '', 'Untitled.png', 'Admin'),
(19, 'Budi doremi', 'budi@gmail.com', 'budi', 'Jl. Sunan Ampel 3 No.5, Dinoyo, Kec. Lowokwaru, Kota Malang', '081334344989', 'Kalimantan Tengah', 'Seruyan', 'Untitled.png', 'Pelanggan'),
(20, 'Sugeng', 'sugeng@gmail.com', 'sugeng', 'asd', '08213213', '', '', 'Untitled.png', 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `idpenjualandetail` int(11) NOT NULL,
  `idpenjualan` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `nama` text NOT NULL,
  `harga` text NOT NULL,
  `berat` text NOT NULL,
  `subberat` text NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`idpenjualandetail`, `idpenjualan`, `idproduk`, `nama`, `harga`, `berat`, `subberat`, `subharga`, `jumlah`) VALUES
(64, 55, 33, 'Nike Air Max', '1900000', '', '', '1900000', '1'),
(65, 56, 33, 'Nike Air Max', '1900000', '', '', '1900000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `namaproduk` text NOT NULL,
  `hargaproduk` text NOT NULL,
  `beratproduk` text NOT NULL,
  `stokproduk` text NOT NULL,
  `fotoproduk` text NOT NULL,
  `deskripsiproduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkategori`, `namaproduk`, `hargaproduk`, `beratproduk`, `stokproduk`, `fotoproduk`, `deskripsiproduk`) VALUES
(33, 16, 'Nike Air Max', '1900000', '1', '98', 'pr1.png', '<p>-</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idbeli` (`idpenjualan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idpenjualandetail`),
  ADD KEY `idpenjualan` (`idpenjualan`),
  ADD KEY `idproduk` (`idproduk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`),
  ADD KEY `id_kategori` (`idkategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idpenjualandetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idpenjualan`) REFERENCES `pemesanan` (`idpenjualan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idpenjualan`) REFERENCES `pemesanan` (`idpenjualan`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
