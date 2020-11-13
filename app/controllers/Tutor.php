<?php

class Tutor extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'tutor/dashboard');
    }
    public function dashboard()
    {
        $this->view("tutor/header");
        $this->view("tutor/index");
        $this->view("tutor/footer");
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
