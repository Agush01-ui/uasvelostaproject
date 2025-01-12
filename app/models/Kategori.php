<?php
class Kategori extends Model
{
    public function getKategori()
    {
        $sql = "SELECT * FROM kategori";
        $result = $this->query($sql);

        $kategori = [];
        while ($row = $result->fetch_assoc()) {
            $kategori[] = $row;
        }

        return $kategori;
    }
}
