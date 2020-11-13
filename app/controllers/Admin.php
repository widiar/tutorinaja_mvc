<?php

class Admin extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'admin/dashboard');
    }
    public function dashboard()
    {
        $this->view("admin/header");
        $this->view("admin/index");
        $this->view("admin/footer");
    }
    public function tutor()
    {
        $this->view("admin/header");
        $this->view("admin/tutor");
        $this->view("admin/footer");
    }
    public function siswa()
    {
        $this->view("admin/header");
        $this->view("admin/siswa");
        $this->view("admin/footer");
    }
}
