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
    public function ambilreservasi($ids)
    {
        $sql = "SELECT * FROM reservasi JOIN tutor ON id_tutor=tutor.id WHERE id_siswa='$ids'";
        return $this->db->result($sql);
    }
    public function ambilsatudatasiswa($data, $kolom)
    {
        $sql = "SELECT * FROM siswa JOIN orangtuasiswa ON siswa.id=orangtuasiswa.id_siswa WHERE $kolom='$data'";
        return $this->db->single($sql);
    }
    public function satututordaerah($cari)
    {
        $cari = strtoupper($cari);
        $sql = "SELECT tutor.id,foto,nama,perkenalan, 
                provinsi.name AS namaprovinsi, kabupaten.`name` AS namakabupaten, 
                kecamatan.`name` AS namakecamatan, kelurahan.`name` AS namakelurahan
                FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
                JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor
                JOIN provinsi ON tutor.provinsi=provinsi.id 
                JOIN kabupaten ON tutor.kabupaten=kabupaten.id 
                JOIN kecamatan ON tutor.kecamatan=kecamatan.id 
                JOIN kelurahan ON tutor.kelurahan=kelurahan.id 
                WHERE provinsi.`name`='$cari' OR kabupaten.`name`='$cari' OR kecamatan.`name`='$cari' OR kelurahan.`name`='$cari'";
        return $this->db->result($sql);
    }
}
