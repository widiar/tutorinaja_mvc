<?php

session_start();
class Siswa extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'siswa/dashboard');
    }
    public function carimapel()
    {
        if (isset($_POST['cari'])) {
            $isi['tutor'] = $this->model('SiswaModel')->ambildatatutor();
            $this->view("siswa/header");
            $this->view("siswa/carimapel", $isi);
            $this->view("siswa/footer");
        }
    }
    public function caridaerah()
    {
        if (isset($_POST['cdaerah'])) {
            $isi['tutor'] = $this->model('SiswaModel')->satututordaerah($_POST['daerah']);
            $this->view("siswa/header");
            $this->view("siswa/caridaerah", $isi);
            $this->view("siswa/footer");
        }
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
    public function detailtutor($id, $dimana)
    {
        $data = $this->model('AdminModel')->ambilsatututor($id);
        if ($data) {
            $string[0] = '
                <table style="width: 980px;">
                    <tr>
                        <td rowspan="15" width="250px">
                            <img src="' . BASEURL . 'asset/tutor/foto/' . $data['foto'] . '" width="220px" />
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
            if (strcmp($dimana, 'ds') == 0)
                $string[1] = '
                    <a href="reservasi/' . $data['username'] . '">
                        <button" class="btn btn-primary">Reservasi</button>
                    </a>
                ';
            elseif (strcmp($dimana, 'cs') == 0) {
                $string[1] = '<button" class="btn btn-primary">Status</button>';
            }
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
    public function mycourse()
    {
        $siswa = $this->model('Auth_model')->ambildatasatu($_SESSION['username'], 'siswa');
        $data = $this->model('SiswaModel')->ambilreservasi($siswa['id']);
        $this->view('siswa/header');
        $this->view('siswa/mycourse', $data);
        $this->view('siswa/footer');
    }

    public function yanglogin()
    {
        $user = $_SESSION['username'];
        $siswa = $this->model('SiswaModel')->ambilsatudatasiswa($user, 'username');
        if ($siswa) {
            $kata = '
            <table style="width: 980px;">
                <tr>
                    <td rowspan="15" width="250px">
                        <img src="' . BASEURL . 'asset/siswa/foto/' . $siswa['foto'] . '" width="200px" />
                    </td>
                </tr>
                <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td>' . $siswa['nama'] . '</td>
                </tr>
                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td>:</td>
                    <td>' . $siswa['jk'] . '</td>
                </tr>
                <tr>
                    <td><b>Tempat Lahir</b></td>
                    <td>:</td>
                    <td>' . $siswa['tempatlahir'] . '</td>
                </tr>
                <tr>
                    <td><b>Tanggal Lahir</b></td>
                    <td>:</td>
                    <td>' . $siswa['tanggallahir'] . '</td>
                </tr>
                <tr>
                    <td><b>No. Telepon</b></td>
                    <td>:</td>
                    <td>' . $siswa['notlp'] . '</td>
                </tr>
                <tr>
                    <td><b>Nama Orang Tua</b></td>
                    <td>:</td>
                    <td>' . $siswa['nama_ortu'] . '</td>
                </tr>
                <tr>
                    <td><b>No. Telepon Orang Tua</b></td>
                    <td>:</td>
                    <td>' . $siswa['notlp_ortu'] . '</td>
                </tr>
                <tr>
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td>' . $siswa['alamat'] . '</td>
                </tr>
                <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td>' . $siswa['jenjangpendidikan'] . '</td>
                </tr>
                <tr>
                    <td><b>Sekolah</b></td>
                    <td>:</td>
                    <td>' . $siswa['asalsekolah'] . '</td>
                </tr>
            </table>
            ';
            echo $kata;
        }
    }
}
