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
                                    <?php if (isset($_SESSION['sukses'])) : ?>
                                        <div class="alert alert-success"><?= $_SESSION['sukses'] ?></div>
                                    <?php unset($_SESSION['sukses']);
                                    endif; ?>
                                    <?php if (isset($_SESSION['gagal'])) : ?>
                                        <div class="alert alert-danger"><?= $_SESSION['gagal'] ?></div>
                                    <?php unset($_SESSION['gagal']);
                                    endif; ?>
                                </div>
                                <form class="user" id="user" action="sukdaftar" method="post">
                                    <div class="form-group">
                                        <input type="text" name="nama" id="daftarNama" class="form-control form-control-user <?php if (isset($_SESSION['errNama'])) echo 'is-invalid'; ?>" placeholder="Masukkan Nama Lengkap..." value="<?php if (isset($_SESSION['valNama'])) echo $_SESSION['valNama'];
                                                                                                                                                                                                                                            unset($_SESSION['valNama']); ?>">
                                        <?php if (isset($_SESSION['errNama'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errNama'] ?>
                                            </div>
                                        <?php unset($_SESSION['errNama']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="notlp" class="form-control form-control-user <?php if (isset($_SESSION['errNotlp'])) echo 'is-invalid'; ?>" placeholder="Masukkan No Telpon..." value="<?php if (isset($_SESSION['valNotlp'])) echo $_SESSION['valNotlp'];
                                                                                                                                                                                                                        unset($_SESSION['valNotlp']); ?>">
                                        <?php if (isset($_SESSION['errNotlp'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errNotlp'] ?>
                                            </div>
                                        <?php unset($_SESSION['errNotlp']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user <?php if (isset($_SESSION['errEmail'])) echo 'is-invalid'; ?>" placeholder="Masukkan Email..." value="<?php if (isset($_SESSION['valEmail'])) echo $_SESSION['valEmail'];
                                                                                                                                                                                                                    unset($_SESSION['valEmail']); ?>">
                                        <?php if (isset($_SESSION['errEmail'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errEmail'] ?>
                                            </div>
                                        <?php unset($_SESSION['errEmail']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="pass" name="password" class="form-control form-control-user <?php if (isset($_SESSION['errPassword'])) echo 'is-invalid'; ?>" placeholder="Masukkan Password...">
                                        <?php if (isset($_SESSION['errPassword'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errPassword'] ?>
                                            </div>
                                        <?php unset($_SESSION['errPassword']);
                                        endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="pass2" name="password2" class="form-control form-control-user <?php if (isset($_SESSION['errPassword2'])) echo 'is-invalid'; ?>" placeholder="Konfirmasi Password...">
                                        <?php if (isset($_SESSION['errPassword2'])) : ?>
                                            <div class="ml-3 invalid-feedback">
                                                <?= $_SESSION['errPassword2'] ?>
                                            </div>
                                        <?php unset($_SESSION['errPassword2']);
                                        endif; ?>
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