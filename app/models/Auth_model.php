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
        $query = "INSERT INTO " . $table . " (nama, notlp, email, username) VALUES (?, ?, ? ,?)";
        $this->db->query($query);
        $param = 'ssss';
        $nama = amankan($data['nama']);
        $notlp = amankan($data['notlp']);
        $email = amankan($data['email']);
        $username = amankan($data['username']);
        $password = amankan($data['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $values = [
            $nama,
            $notlp,
            $email,
            $username,
        ];
        $this->db->bind($param, $values);
        $cek = $this->db->execute();
        if ($cek == 1) {
            $query = "INSERT INTO user (username, password, role) VALUES (?, ?, ?)";
            if (isset($data['siswa'])) $role = 1;
            else $role = 2;
            $this->db->query($query);
            $param = 'sss';
            $values = [$username, $password, $role];
            $this->db->bind($param, $values);
            $cekuser = $this->db->execute();
            if ($cekuser == 1) return 1;
            else return $cekuser;
        } else
            return $cek;
    }
    public function maumasuk($user)
    {
        $query = "SELECT * FROM user WHERE username='$user'";
        return $this->db->single($query);
    }

    public function ambildatasatu($data, $table)
    {
        $sql = "SELECT * FROM $table WHERE username='$data'";
        return $this->db->single($sql);
    }
}
