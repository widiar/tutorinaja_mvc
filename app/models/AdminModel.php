<?php
class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function ambildatatutor()
    {
        $sql = "SELECT *, `user`.profileLengkap, `user`.verif FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        JOIN `user` USING(username)";
        return $this->db->result($sql);
    }
    public function ambilsatu($id, $table, $kolom)
    {
        $sql = "SELECT * FROM $table WHERE $kolom='$id'";
        return $this->db->single($sql);
    }
    public function ambilsatututor($id)
    {
        $sql = "SELECT * FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        WHERE id='$id'";
        return $this->db->single($sql);
    }
    public function veriftutor($user, $data)
    {
        $sql = "UPDATE user SET verif=$data WHERE username='$user'";
        if ($this->db->queryexecute($sql) == 1) return 1;
    }
}
