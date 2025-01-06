<?php

class Produk extends Model
{
    public function getProdukLimit()
    {
        $sql = "SELECT * FROM produk LEFT JOIN kategori ON produk.idkategori = kategori.idkategori ORDER BY idproduk DESC LIMIT 3";
        $result = $this->query($sql);

       

    
        // Konversi data menjadi array
        $produk = [];
        while ($row = $result->fetch_assoc()) {
            $produk[] = $row;
        }

        return $produk;
    }
    public function getProduk()
    {
        $sql = "SELECT * FROM produk LEFT JOIN kategori ON produk.idkategori = kategori.idkategori";
        $result = $this->query($sql);

       

        // Konversi data menjadi array
        $produk = [];
        while ($row = $result->fetch_assoc()) {
            $produk[] = $row;
        }

        return $produk;
    }

    public function getProdukById($id)
    {
        $sql = "SELECT * FROM produk WHERE idproduk = '$id'";
        return $this->query($sql)->fetch_assoc();
    }
}
