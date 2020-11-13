<?php

class Murid_model
{
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function tambahmurid($data)
    {
        $query = "INSERT INTO " . $this->table . " (nama, notlp, email, password) VALUES (?, ?, ? ,?)";
        $this->db->query($query);
        $param = 'ssss';
        $values = [
            $data['nama'],
            $data['notlp'],
            $data['email'],
            $data['password'],
        ];
        $this->db->bind($param, $values);
        $this->db->execute();
        // return $this->db->rowCount();
    }
}
