<?php

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
        if (isset($_POST['siswa'])) {
            $this->model('Murid_model')->tambahmurid($_POST);
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
