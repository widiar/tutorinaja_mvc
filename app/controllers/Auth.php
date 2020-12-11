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
    private function validation($data, $rules)
    {
        $error = false;
        foreach ($rules as $name => $isinya) {
            $data[$name] = amankan($data[$name]);
            $isi = explode("|", $isinya);
            foreach ($isi as $ini) {
                if (strcmp($ini, 'required') == 0) {
                    if (empty($data[$name])) {
                        $_SESSION['error' . $name] = $name . " harus di isi";
                        $error = true;
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
                }
            }
            if ($error) $_SESSION['val' . $name] = $data[$name];
        }
        return $error;
    }
    public function sukdaftar()
    {
        if (isset($_POST['siswa']) || isset($_POST['tutor'])) {
            //validation
            $rules = [
                'nama' => 'required',
                'notlp' => 'required',
                'username' => 'required|satukata',
                'email' => 'required|email',
                'password' => 'required|sama:password2',
                'password2' => 'required'
            ];
            $error = $this->validation($_POST, $rules);
            if ($error) {
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
            header('Location: ' . BASEURL . 'auth/login');
        } else {
            $_SESSION['gagal'] = "Gagal mendaftar karna " . $cek;
            header('Location: ' . BASEURL . 'auth/daftar');
        }
    }
    public function masuk()
    {
        if (isset($_POST['login'])) {
            $username = amankan($_POST['username']);
            $password = amankan($_POST['password']);
            $rules = [
                'username' => 'required|satukata',
            ];
            if ($this->validation($_POST, $rules)) {
                header('Location: ' . BASEURL . 'auth/login');
                die;
            }
            $data = $this->model('Auth_model')->maumasuk($username);
            if ($data) {
                if (password_verify($password, $data['password'])) {
                    if ($data['role'] == 2) { //tutor
                        if ($data['profileLengkap'] <= 2) {
                            $_SESSION['username'] = $username;
                            $_SESSION['ceklengkap'] = $data['profileLengkap'];
                            header('Location: ' . BASEURL . 'auth/tutor');
                            die;
                        }
                    }
                } else $_SESSION['gagal'] = "Password anda salah";
            } else $_SESSION['gagal'] = "Username belum terdaftar";
            header('Location: ' . BASEURL . 'auth/login');
        }
    }
    public function tutor()
    {
        if (isset($_SESSION['username'])) {
            $data['user'] = $this->model('Auth_model')->ambildatasatu($_SESSION['username'], 'tutor');
            $data['provinsi'] = $this->model('AlamatModel')->ambilprovinsi();
            $this->view('profile/tutor', $data);
        } else {
            header('Location:' . BASEURL . 'auth/login');
        }
    }
    public function sukdatatutor()
    {
        if (isset($_POST['kirim'])) {
            $rules = [
                'nama' => 'required',
                'namapanggilan' => 'required',
                'jeniskelamin' => 'required',
                'notlp' => 'required',
                'tempatlahir' => 'required',
                'tanggallahir' => 'required',
                'provinsi' => 'required',
                'kabupaten' => 'required',
                'kecamatan' => 'required',
                'kelurahan' => 'required',
                'alamat' => 'required',
            ];
            // var_dump($_POST['jeniskelamin']);
            // die;
            if ($this->validation($_POST, $rules)) {
                header('Location: ' . BASEURL . 'auth/tutor');
                die;
            }
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL . 'auth/login');
    }
    public function alamat($jenis)
    {
        switch ($jenis) {
            case 'kabupaten':
                $idprov = $_POST['id_provinsi'];
                $data = $this->model('AlamatModel')->ambilkabupaten($idprov);
                foreach ($data as $kabupaten) {
                    echo '<option value="' . $kabupaten['id'] . '">' . $kabupaten['name'] . '</option>';
                }
                break;
            case 'kecamatan':
                $idkab = $_POST['id_kabupaten'];
                $data = $this->model('AlamatModel')->ambilkecamatan($idkab);
                foreach ($data as $kecamatan) {
                    echo '<option value="' . $kecamatan['id'] . '">' . $kecamatan['name'] . '</option>';
                }
                break;
            case 'kelurahan':
                $idkec = $_POST['id_kecamatan'];
                $data = $this->model('AlamatModel')->ambilkelurahan($idkec);
                foreach ($data as $kelurahan) {
                    echo '<option value="' . $kelurahan['id'] . '">' . $kelurahan['name'] . '</option>';
                }
                break;
        }
    }
}
