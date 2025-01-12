<?php
class Pengguna extends Model
{
    public function getPenggunaById($id)
    {
        $sql = "SELECT * FROM pengguna WHERE id = $id";
        return $this->query($sql)->fetch_assoc();
    }
}
