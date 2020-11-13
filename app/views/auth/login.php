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
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                                </div>
                                <form class="user" action="masuk" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" aria-describedby="emailHelp" placeholder="Masukkan Username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Masukkan Password...">
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="daftar">Buat akun baru!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block my-auto">
                            <img src="<?= BASEURL ?>/img/video_tutorial_.png" alt="" width="400px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>