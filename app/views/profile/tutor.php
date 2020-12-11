<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/bootstrap-select.css">

    <title>Formulir Tutor</title>
</head>

<body>
    <div class="mb-4" style="background-color: #17a2b8; width: 100%;">
        <br>
        <h2 class="text-center mt-3 text-white">DATA PROFIL TUTOR</h2>
        <br>
        <div class="container">
            <a href="logout">
                <button class="btn btn-primary btn-sm mb-2">Logout</button>
            </a>
        </div>
    </div>
    <div class="container">
        <form action="sukdatatutor" method="post" enctype="multipart/form-data">
            <?php if ($_SESSION['ceklengkap'] == 0) : ?>
                <div class="data-profil">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control <?php if (isset($_SESSION['errornama'])) echo 'is-invalid'; ?>" name="nama" value="<?= $data['user']['nama'] ?>">
                                <?php if (isset($_SESSION['errornama'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errornama'] ?>
                                    </div>
                                <?php unset($_SESSION['errornama']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="username" class="form-control" name="username" value="<?= $data['user']['username'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Panggilan</label>
                                <input type="text" class="form-control <?php if (isset($_SESSION['errornamapanggilan'])) echo 'is-invalid'; ?>" name="namapanggilan" placeholder="Masukkan nama panggilan anda" value="<?php if (isset($_SESSION['valnamapanggilan'])) echo $_SESSION['valnamapanggilan'];
                                                                                                                                                                                                                        unset($_SESSION['valnamapanggilan']); ?>">
                                <?php if (isset($_SESSION['errornamapanggilan'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errornamapanggilan'] ?>
                                    </div>
                                <?php unset($_SESSION['errornamapanggilan']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $data['user']['email'] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control <?php if (isset($_SESSION['errorjeniskelamin'])) echo 'is-invalid'; ?>" name="jeniskelamin">
                                    <option selected disabled>Jenis Kelamin</option>
                                    <option <?php if (isset($_SESSION['valjeniskelamin'])) if (strcmp($_SESSION['valjeniskelamin'], 'perempuan') == 0) echo 'selected'; ?> value="perempuan">Perempuan</option>
                                    <option <?php if (isset($_SESSION['valjeniskelamin'])) if (strcmp($_SESSION['valjeniskelamin'], "lakilaki") == 0) echo 'selected'; ?> value="lakilaki">Laki-Laki</option>
                                    <?php if (isset($_SESSION['valjeniskelamin'])) unset($_SESSION['valjeniskelamin']) ?>
                                </select>
                                <?php if (isset($_SESSION['errorjeniskelamin'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errorjeniskelamin'] ?>
                                    </div>
                                <?php unset($_SESSION['errorjeniskelamin']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telepon</label>
                                <input type="number" name="notlp" class="form-control <?php if (isset($_SESSION['errornotlp'])) echo 'is-invalid'; ?>" value="<?= $data['user']['notlp'] ?>">
                                <?php if (isset($_SESSION['errornotlp'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errornotlp'] ?>
                                    </div>
                                <?php unset($_SESSION['errornotlp']);
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempatlahir" class="form-control <?php if (isset($_SESSION['errortempatlahir'])) echo 'is-invalid'; ?>" placeholder="Masukkan tempat lahir anda" value="<?php if (isset($_SESSION['valtempatlahir'])) echo $_SESSION['valtempatlahir'];
                                                                                                                                                                                                                    unset($_SESSION['valtempatlahir']); ?>">
                                <?php if (isset($_SESSION['errortempatlahir'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $_SESSION['errortempatlahir'] ?>
                                    </div>
                                <?php unset($_SESSION['errortempatlahir']);
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggallahir" class="form-control" placeholder="Masukkan tanggal lahir anda">
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>Alamat</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <br>
                                <select name="provinsi" class="selectpicker provinsi" data-live-search="true" title="Provinsi" data-size="7" data-width="100%">
                                    <?php foreach ($data['provinsi'] as $prov) : ?>
                                        <option value="<?= $prov['id'] ?>"><?= $prov['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kabupaten</label> <br>
                                <select name="kabupaten" class="selectpicker kabupaten" id="kabupaten" data-live-search="true" title="Kabupaten" data-size="7" data-width="100%">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label> <br>
                                <select name="kecamatan" class="selectpicker kecamatan" id="kecamatan" data-live-search="true" title="Kecamatan" data-size="7" data-width="100%">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelurahan</label> <br>
                                <select name="kelurahan" class="selectpicker kelurahan" id="kelurahan" data-live-search="true" title="Kelurahan" data-size="7" data-width="100%">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Detail Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="Masukkan detail alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            <?php elseif ($_SESSION['ceklengkap'] == 1) : ?>
                <div class="riwayat-pendidikan">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control">
                                    <option>Pendidikan Terakhir</option>
                                    <option>SMA/Sederajat</option>
                                    <option>D1</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4/S1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester</label>
                                <input type="text" class="form-control" placeholder="Keterangan pendidikan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Perguruan Tinggi</label>
                                <input type="text" class="form-control" placeholder="Nama perguruan tinggi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" class="form-control" placeholder="Keterangan program studi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>IPK Terakhir</label>
                                <input type="text" class="form-control" placeholder="Masukkan IPK terakhir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Upload foto</label>
                                <input type="file" class="form-control-file">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Upload ijazah/transkrip nilai terakhir</label>
                                <input type="file" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            <?php endif; ?>
            <button type="submit" name="kirim" class="btn btn-primary mb-5">SELANJUTNYA</button></a>
        </form>
    </div>

    <script src="<?= BASEURL ?>/js/jquery.js"></script>
    <script src="<?= BASEURL ?>/js/bootstrap.bundle.js"></script>
    <script src="<?= BASEURL ?>/js/jsnya.js"></script>
    <script src="<?= BASEURL ?>/js/bootstrap-select.js"></script>
    <script src="<?= BASEURL ?>/js/select/defaults-id_ID.js"></script>

    <script>
        $(".provinsi").change(function() {
            var id = $(this).val();
            var urel = "<?= BASEURL ?>/auth/alamat/kabupaten";
            $.ajax({
                type: "post",
                url: urel,
                dataType: "html",
                data: "id_provinsi=" + id,
                success: function(msg) {
                    $("#kabupaten").html(msg).selectpicker('refresh');
                    $(".kabupaten").selectpicker('refresh');
                    ambildatakecamatan();
                }
            });
        });
        $("#kabupaten").change(ambildatakecamatan);

        function ambildatakecamatan() {
            var idkb = $("#kabupaten").val();
            var urelkc = "<?= BASEURL ?>/auth/alamat/kecamatan";
            $.ajax({
                type: "post",
                url: urelkc,
                dataType: "html",
                data: "id_kabupaten=" + idkb,
                success: function(msg) {
                    $("#kecamatan").html(msg).selectpicker('refresh');
                    $("select.kecamatan").selectpicker('refresh');
                    ambildatakelurahan();
                }
            });
        }
        $("#kecamatan").change(ambildatakelurahan);

        function ambildatakelurahan() {
            var idkc = $("#kecamatan").val();
            var urlkl = "<?= BASEURL ?>/auth/alamat/kelurahan";
            $.ajax({
                type: 'post',
                url: urlkl,
                dataType: 'html',
                data: "id_kecamatan=" + idkc,
                success: function(msg) {
                    $("#kelurahan").html(msg).selectpicker('refresh');
                    $("select.kelurahan").selectpicker('refresh');
                }
            });
        }
    </script>
</body>

</html>