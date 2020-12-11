<?php

session_start();
class Auth extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'auth/daftar');
    }
    public function login()
    {
        $data['judul'] = 'Halaman Login';
        $this->view('auth/header', $data);
        $this->view('auth/login');
        $this->view('auth/footer');
    }
    public function daftar()
    {
        $data['judul'] = 'Halaman Daftar';
        $this->view('auth/header', $data);
        $this->view('auth/daftar');
        $this->view('auth/footer');
    }
    public function sukdaftar()
    {
        if (isset($_POST['siswa']) || isset($_POST['tutor'])) {
            $nama = amankan($_POST['nama']);
            $notlp = amankan($_POST['notlp']);
            $email = amankan($_POST['email']);
            $password = amankan($_POST['password']);
            $password2 = amankan($_POST['password2']);
            //validation
            if (empty($nama) || empty($notlp) || empty($email) || empty($password) || empty($password2)) {
                if (empty($nama))
                    $_SESSION['errNama'] = "Nama harus di isi";
                else
                    $_SESSION['valNama'] = $nama;
                if (empty($notlp))
                    $_SESSION['errNotlp'] = "Nomor Telepon harus di isi";
                else
                    $_SESSION['valNotlp'] = $notlp;
                if (empty($email))
                    $_SESSION['errEmail'] = "Alamat Email harus di isi";
                else
                    $_SESSION['valEmail'] = $email;
                if (empty($password))
                    $_SESSION['errPassword'] = "Password harus di isi";
                if (empty($password2))
                    $_SESSION['errPassword2'] = "Konfirmasi Password harus di isi";
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['errEmail'] = "Alamat Email harus valid dengan alamat email";
                    $_SESSION['valEmail'] = $email;
                }
                header('Location: ' . BASEURL . 'auth/daftar');
                die;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['errEmail'] = "Alamat Email harus valid dengan alamat email";
                $_SESSION['valEmail'] = $email;
                $_SESSION['valNama'] = $nama;
                $_SESSION['valNotlp'] = $notlp;
                header('Location: ' . BASEURL . 'auth/daftar');
                die;
            }

            if (strcmp($password, $password2) != 0) {
                $_SESSION['errPassword2'] = "Password dan Konfirmasi Password haruslah sama";
                $_SESSION['valEmail'] = $email;
                $_SESSION['valNama'] = $nama;
                $_SESSION['valNotlp'] = $notlp;
                header('Location: ' . BASEURL . 'auth/daftar');
                die;
            }
        } //end validation
        if (isset($_POST['siswa'])) {
            $cek = $this->model('Auth_model')->pendaftaran($_POST, 'siswa');
        } else if (isset($_POST['tutor'])) {
            $cek = $this->model('Auth_model')->pendaftaran($_POST, 'tutor');
        }
        if ($cek == 1) {
            $_SESSION['sukses'] = "Berhasil mendaftar";
            header('Location: ' . BASEURL . 'auth/daftar');
        } else {
            $_SESSION['gagal'] = "Gagal mendaftar karna " . $cek;
            header('Location: ' . BASEURL . 'auth/daftar');
        }
    }
    public function masuk()
    {
        if (isset($_POST['login'])) {
            header('Location: ' . BASEURL . 'admin/dashboard');
        }
    }
}
