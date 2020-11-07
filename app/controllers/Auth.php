<?php

class Auth extends Controller
{
    public function login()
    {
        $data['judul'] = 'Halaman Login';
        return $this->view('login', $data);
    }
}
