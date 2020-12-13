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
        $nama = amankan($data['nama']);
        $notlp = amankan($data['notlp']);
        $email = amankan($data['email']);
        $username = amankan($data['username']);
        $password = amankan($data['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);
        if (isset($data['siswa'])) $role = 3;
        else $role = 2;
        $query = "INSERT INTO user (username, password, role) VALUES (?, ?, ?)";
        $this->db->query($query);
        $param = 'sss';
        $values = [$username, $password, $role];
        $this->db->bind($param, $values);
        $cekuser = $this->db->execute();
        if ($cekuser == 1) {
            $query = "INSERT INTO " . $table . " (nama, notlp, email, username) VALUES (?, ?, ? ,?)";
            $this->db->query($query);
            $param = 'ssss';
            $values = [
                $nama,
                $notlp,
                $email,
                $username,
            ];
            $this->db->bind($param, $values);
            $cek = $this->db->execute();
            if ($cek == 1) return 1;
            else return $cek;
        } else return $cekuser;
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
    public function updatetutorsatu($data, $user)
    {
        $nama = amankan($data['nama']);
        $npanggilan = amankan($data['namapanggilan']);
        $jk = amankan($data['jeniskelamin']);
        $notlp = amankan($data['notlp']);
        $tempatlahir = amankan($data['tempatlahir']);
        $tanggallahir = amankan($data['tanggallahir']);
        $provinsi = amankan($data['provinsi']);
        $kabupaten = amankan($data['kabupaten']);
        $kecamatan = amankan($data['kecamatan']);
        $kelurahan = amankan($data['kelurahan']);
        $alamat = amankan($data['alamat']);
        $sql = "UPDATE tutor SET 
        nama=?, 
        namapanggilan=?, 
        jk=?, 
        notlp=?, 
        tempatlahir=?, 
        tanggallahir=?, 
        provinsi=?, 
        kabupaten=?, 
        kecamatan=?, 
        kelurahan=?, 
        alamat=? 
        WHERE username='$user'";
        $this->db->query($sql);
        $param = 'sssssssssss';
        $values = [
            $nama, $npanggilan, $jk, $notlp, $tempatlahir, $tanggallahir, $provinsi, $kabupaten, $kecamatan, $kelurahan, $alamat,
        ];
        $this->db->bind($param, $values);
        $tmp = $this->db->execute();
        if ($tmp == 1) {
            $sql = "UPDATE user SET profileLengkap=1 WHERE username='$user'";
            $ceklg = $this->db->queryexecute($sql);
            if ($ceklg == 1) return 1;
        }
    }

    public function updatetutordua($data, $user)
    {
        // $this->db->close();
        $tutor = $this->db->single("SELECT * FROM tutor WHERE username='$user'");
        $pendidikan_terakhir = amankan($data['pendidikan_terakhir']);
        $keterangan_pendidikan = amankan($data['keterangan_pendidikan']);
        $perguruan_tinggi = amankan($data['perguruan_tinggi']);
        $program_studi = amankan($data['program_studi']);
        $IPK = amankan($data['IPK']);
        $ekstensifoto = pathinfo($data['foto']['name'], PATHINFO_EXTENSION);
        $ekstensiijasah = pathinfo($data['ijasah']['name'], PATHINFO_EXTENSION);
        $namefoto = uniqid(1) . "." . $ekstensifoto;
        $namaijasah = uniqid(2) . "." . $ekstensiijasah;
        $sql = "INSERT INTO riwayatpendidikan (id_tutor, pendidikan_terakhir, keterangan_pendidikan, perguruan_tinggi, prodi, ipk, ijasah) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql);
        $params = "issssds";
        $values = [
            $tutor['id'], $pendidikan_terakhir, $keterangan_pendidikan, $perguruan_tinggi, $program_studi, $IPK, $namaijasah
        ];
        // var_dump($values);
        // die;
        $this->db->bind($params, $values);
        $dirijasah = "../public/tutor/ijasah/";
        $dirfoto = "../public/tutor/foto/";
        $cekdeh = $this->db->execute();
        if ($cekdeh == 1) {
            move_uploaded_file($data['ijasah']['tmp_name'], $dirijasah . $namaijasah);
            $q = "UPDATE tutor SET foto='$namefoto' WHERE username='$user'";
            if ($this->db->queryexecute($q) == 1) {
                move_uploaded_file($data['foto']['tmp_name'], $dirfoto . $namefoto);
                $sql = "UPDATE user SET profileLengkap=2 WHERE username='$user'";
                if ($this->db->queryexecute($sql) == 1) return 1;
            }
        } else
            return $cekdeh;
    }
    public function updatetutortiga($data, $user)
    {
        $tutor = $this->db->single("SELECT * FROM tutor WHERE username='$user'");
        $perkenalan = amankan($data['perkenalan']);
        $pengalaman = amankan($data['pengalaman']);
        $prestasi = amankan($data['prestasi']);
        $biaya90menit = amankan($data['biaya90menit']);
        $biaya120menit = amankan($data['biaya120menit']);
        $metode_mengajar = amankan($data['metode_mengajar']);
        $minatngajar = amankan($data['minatngajar']);
        $minatmapel = amankan($data['minatmapel']);
        $sql = "INSERT INTO deskripsitutor (id_tutor, perkenalan, pengalaman, prestasi, biaya90menit, biaya120menit, metodengajar, minatngajar, minatmapel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql);
        $params = 'isssiisss';
        $values = [
            $tutor['id'], $perkenalan, $pengalaman, $prestasi, $biaya90menit, $biaya120menit, $metode_mengajar, $minatngajar, $minatmapel,
        ];
        $this->db->bind($params, $values);
        if ($this->db->execute() == 1) {
            $sql = "UPDATE user SET profileLengkap=3 WHERE username='$user'";
            if ($this->db->queryexecute($sql) == 1) return 1;
        }
    }
    public function updatedata($user, $kolom, $data)
    {
        $sql = "UPDATE user SET $kolom='$data' WHERE username='$user'";
        if ($this->db->queryexecute($sql) == 1) return 1;
    }
}
