<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Daftar</h1>
                                </div>
                                <form class="user" action="sukdaftar" method="post">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control form-control-user" placeholder="Masukkan Nama Lengkap...">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="notlp" class="form-control form-control-user" placeholder="Masukkan No Telpon...">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" placeholder="Masukkan Email...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" placeholder="Masukkan Password...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control form-control-user" placeholder="Konfirmasi Password...">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" name="tutor" class="btn btn-primary btn-user btn-block">
                                                Daftar Sebagai Tutor
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" name="siswa" class="btn btn-success btn-user btn-block">
                                                Daftar Sebagai Siswa
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="login">Sudah punya akun? Login!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block my-auto">
                            <img src="<?= BASEURL ?>/img/business_conference_.png" alt="" width="400px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>