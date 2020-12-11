<?php

class AlamatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function ambilprovinsi()
    {
        $sql = "SELECT * FROM provinsi";
        return $this->db->result($sql);
    }

    public function ambilkabupaten($id)
    {
        $sql = "SELECT * FROM kabupaten WHERE provinsi_id='$id'";
        return $this->db->result($sql);
    }
    public function ambilkecamatan($id)
    {
        $sql = "SELECT * FROM kecamatan WHERE kabupaten_id='$id'";
        return $this->db->result($sql);
    }
    public function ambilkelurahan($id)
    {
        $sql = "SELECT * FROM kelurahan WHERE kecamatan_id='$id'";
        return $this->db->result($sql);
    }
}
