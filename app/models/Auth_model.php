<?php

class Auth_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function pendaftaran($data, $table)
    {
        $query = "INSERT INTO " . $table . " (nama, notlp, email, password) VALUES (?, ?, ? ,?)";
        $this->db->query($query);
        $param = 'ssss';
        $nama = amankan($data['nama']);
        $notlp = amankan($data['notlp']);
        $email = amankan($data['email']);
        $password = amankan($data['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $values = [
            $nama,
            $notlp,
            $email,
            $password,
        ];
        $this->db->bind($param, $values);
        $cek = $this->db->execute();
        if ($cek == 1)
            return 1;
        else
            return $cek;
    }
}
