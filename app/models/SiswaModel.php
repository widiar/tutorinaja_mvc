<?php
class SiswaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function ambildatatutor()
    {
        $sql = "SELECT * FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor";
        return $this->db->result($sql);
    }

    public function ambilsatututor($username)
    {
        $sql = "SELECT * FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        WHERE username='$username'";
        return $this->db->single($sql);
    }
    public function reservasi($data, $user)
    {
        $durasi = amankan($data['durasi']);
        $matapelajaran = amankan($data['matapelajaran']);
        $lokasibelajar = amankan($data['lokasibelajar']);
        $siswa = $this->db->single("SELECT id FROM siswa WHERE username='$user'");
        $idt = amankan($data['idtutor']);
        $sql = "INSERT INTO reservasi (id_siswa, id_tutor, durasi, mapel, lokasibelajar) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql);
        $param = 'iisss';
        $values = [$siswa['id'], $idt, $durasi, $matapelajaran, $lokasibelajar];
        $this->db->bind($param, $values);
        if ($this->db->execute() == 1) return 1;
    }
}
