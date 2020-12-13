<?php

session_start();
class Tutor extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'tutor/dashboard');
    }
    public function dashboard()
    {
        if (isset($_SESSION['username'])) {
            $data = $this->model('Auth_model')->maumasuk($_SESSION['username']);
            if ($data['verif'] == 1) {
                $this->view("tutor/header");
                $this->view("tutor/index");
                $this->view("tutor/footer");
            } else if ($data['profileLengkap'] == 3) {
                if ($this->model('Auth_model')->updatedata($_SESSION['username'], 'profileLengkap', 4) != 1) die;
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
    public function matematika()
    {
        $this->view("tutor/header");
        $this->view("tutor/matematika");
        $this->view("tutor/footer");
    }
    public function ipa()
    {
        $this->view("tutor/header");
        $this->view("tutor/ipa");
        $this->view("tutor/footer");
    }
    public function info()
    {
        $this->view("tutor/header");
        $this->view("tutor/info");
        $this->view("tutor/footer");
    }
}
