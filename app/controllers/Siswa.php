<?php

session_start();
class Siswa extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'siswa/dashboard');
    }
    public function dashboard()
    {
        if (isset($_SESSION['username'])) {
            $data = $this->model('Auth_model')->maumasuk($_SESSION['username']);
            if ($data['verif'] == 1) {
                $isi['tutor'] = $this->model('SiswaModel')->ambildatatutor();
                $this->view("siswa/header");
                $this->view("siswa/index", $isi);
                $this->view("siswa/footer");
            } else if ($data['profileLengkap'] == 2) {
                if ($this->model('Auth_model')->updatedata($_SESSION['username'], 'profileLengkap', 3) != 1 || $this->model('Auth_model')->updatedata($_SESSION['username'], 'verif', 1) != 1) die;
                $_SESSION['sukses'] = "Anda berhasil melengkapi isi data. Silahkan Login Ulang";
                unset($_SESSION['username']);
                unset($_SESSION['ceklengkap']);
                header('Location: ' . BASEURL . 'auth/login');
                die;
            } else {
                $_SESSION['sukses'] = "Anda belum di verifikasi oleh admin";
                unset($_SESSION['username']);
                unset($_SESSION['ceklengkap']);
                header('Location: ' . BASEURL . 'auth/login');
                die;
            }
        } else header('Location: ' . BASEURL . 'auth/login');
    }
    public function detailtutor($id)
    {
        $data = $this->model('AdminModel')->ambilsatututor($id);
        if ($data) {
            $string[0] = '
                <table style="width: 980px;">
                    <tr>
                        <td rowspan="15" width="250px">
                            <img src="' . BASEURL . 'tutor/foto/' . $data['foto'] . '" width="220px" />
                        </td>
                    </tr>
                    <tr>
                        <td><b>Nama Lengkap</b></td>
                        <td>:</td>
                        <td>' . $data['nama'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>:</td>
                        <td>' . $data['jk'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Tempat Lahir</b></td>
                        <td>:</td>
                        <td>' . $data['tempatlahir'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Lahir</b></td>
                        <td>:</td>
                        <td>' . $data['tanggallahir'] . '</td>
                    </tr>
                    <tr>
                        <td><b>No. Telepon</b></td>
                        <td>:</td>
                        <td>' . $data['notlp'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td>:</td>
                        <td>' . $data['alamat'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Perguruan Tinggi</b></td>
                        <td>:</td>
                        <td>' . $data['perguruan_tinggi'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Program Studi</b></td>
                        <td>:</td>
                        <td>' . $data['prodi'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Minat Mengajar</b></td>
                        <td>:</td>
                        <td>' . $data['minatngajar'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Biaya per sesi</b></td>
                    </tr>
                    <tr>
                        <td><i>- 90 menit</i></td>
                        <td>:</td>
                        <td>' . $data['biaya90menit'] . '</td>
                    </tr>
                    <tr>
                        <td><i>- 120 menit</i></td>
                        <td>:</td>
                        <td>' . $data['biaya120menit'] . '</td>
                    </tr>
                </table>
                <br>
                <div class="text">
                    <h5><i class="fas fa-book mr-2"></i>Pengalaman Mengajar</h5>
                    <p>' . $data['pengalaman'] . '</p>
                </div>
                <div class="text">
                    <h5><i class="fas fa-medal mr-2"></i>Prestasi</h5>
                    <p>' . $data['prestasi'] . '</p>
                </div>
                <div class="text">
                    <h5><i class="fas fa-chalkboard-teacher mr-2"></i>Metode Mengajar</h5>
                    <p>' . $data['metodengajar'] . '</p>
                </div>
            ';
            $string[1] = '
                <a href="reservasi/' . $data['username'] . '">
                    <button" class="btn btn-primary">Reservasi</button>
                </a>
            ';
            echo json_encode($string);
        }
    }
    public function reservasi($tutor)
    {
        $data = $this->model('SiswaModel')->ambilsatututor($tutor);
        $this->view('siswa/reservasi', $data);
    }
    public function sukreservasi()
    {
        if (isset($_POST['masuk'])) {
            $tutor = $_POST['usertutor'];
            $user = $_SESSION['username'];
            $rules = [
                'durasi' => 'required',
                'matapelajaran' => 'required',
                'lokasibelajar' => 'required',
            ];
            if ($this->validation($_POST, $rules)) {
                header('Location: ' . BASEURL . 'siswa/reservasi/' . $tutor);
                die;
            }
            if ($this->model('SiswaModel')->reservasi($_POST, $user) == 1) {
                header('Location: ' . BASEURL . 'siswa/dahsboard');
                die;
            }
        }
    }

    private function validation($data, $rules)
    {
        $error = false;
        foreach ($rules as $name => $isinya) {
            if (!isset($data[$name]['name']))
                $data[$name] = amankan($data[$name]);
            $isi = explode("|", $isinya);
            foreach ($isi as $ini) {
                if (strcmp($ini, 'required') == 0) {
                    if (isset($data[$name]['name'])) {
                        if (empty($data[$name]['name'])) {
                            $_SESSION['error' . $name] = $name .  " harus di isi";
                            $error = true;
                        }
                    } else {
                        if (empty($data[$name])) {
                            $_SESSION['error' . $name] = $name . " harus di isi";
                            $error = true;
                        }
                    }
                } else if (strcmp($ini, 'satukata') == 0) {
                    $tmp = explode(" ", $data[$name]);
                    if (count($tmp) > 1) {
                        $_SESSION['error' . $name] = $name . " tidak boleh ada spasi";
                        $error = true;
                    }
                } else if (strcmp($ini, 'email') == 0) {
                    if (!filter_var($data[$name], FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['error' . $name] = $name .  " haruslah valid email";
                        $error = true;
                    }
                } else if (strpos($ini, 'sama') !== false) {
                    $tmp = explode(":", $ini);
                    if (strcmp($data[$name], $data[$tmp[1]]) != 0) {
                        $_SESSION['error' . $name] = $name . " dan " . $tmp[1] . " harus sama";
                        $error = true;
                    }
                } else if (strcmp($ini, 'image') == 0) {
                    if (getimagesize($data[$name]['tmp_name']) === false) {
                        $_SESSION['error' . $name] = $name .  " haruslah sebuah image";
                        $error = true;
                    }
                } else if (strpos($ini, 'tipefile') !== false) {
                    $tmp = explode(":", $ini);
                    $tipenya = explode(",", $tmp[1]);
                    $ekstensinya = strtolower(pathinfo($data[$name]['name'], PATHINFO_EXTENSION));
                    if (!in_array($ekstensinya, $tipenya)) {
                        if (!isset($_SESSION['error' . $name])) $_SESSION['error' . $name] = $name .  " ekstensinya tidak sesuai";
                        $error = true;
                    }
                }
            }
        }
        foreach ($rules as $name => $isi) if ($error) $_SESSION['val' . $name] = $data[$name];
        return $error;
    }
}
