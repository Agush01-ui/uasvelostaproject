<?php

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "velostadb");
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }
    public function getDb()
    {
        return $this->db;
    }
}
