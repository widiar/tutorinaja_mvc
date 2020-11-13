<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>/fontawesome/css/all.min.css">

    <title>Dashboard Tutor</title>
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand font-weight-bold text-white" href="<?= BASEURL ?>">
                <i class="fab fa-accusoft mr-2"></i>Tutorin Aja!
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-2">
                        <a class="nav-link text-white" href="#" role="button" data-toggle="modal" data-target="#profiltutor">PROFIL<i class="fas fa-user-alt ml-2"></i></a>
                    </li>

                    <li class="nav-item ml-2">
                        <a class="nav-link text-white" href="#" role="button" data-toggle="modal" data-target="#logout">LOGOUT<i class="fas fa-sign-out-alt ml-2"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="profiltutor" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Profil Tutor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table style="width: 980px;">
                        <tr>
                            <td rowspan="15" width="250px">
                                <img src="<?= BASEURL ?>img/gambar1.jpg" width="200px" height="200px" />
                            </td>
                        </tr>
                        <tr>
                            <td><b>Nama Lengkap</b></td>
                            <td>:</td>
                            <td>Candra Dwi Mertasari</td>
                        </tr>
                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td>:</td>
                            <td>Perempuan</td>
                        </tr>
                        <tr>
                            <td><b>Tempat Lahir</b></td>
                            <td>:</td>
                            <td>Denpasar</td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td>:</td>
                            <td>22 September 1996</td>
                        </tr>
                        <tr>
                            <td><b>No. Telepon</b></td>
                            <td>:</td>
                            <td>081xxxxxxxxx</td>
                        </tr>
                        <tr>
                            <td><b>Nama Orang Tua</b></td>
                            <td>:</td>
                            <td>Andin Dewi</td>
                        </tr>
                        <tr>
                            <td><b>No. Telepon Orang Tua</b></td>
                            <td>:</td>
                            <td>081xxxxxxxxx</td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td>:</td>
                            <td>Jalan Gatot Subroto</td>
                        </tr>
                        <tr>
                            <td><b>Kelas</b></td>
                            <td>:</td>
                            <td>VI SD</td>
                        </tr>
                        <tr>
                            <td><b>Sekolah</b></td>
                            <td>:</td>
                            <td>SD 1 Denpasar</td>
                        </tr>
                        <tr>
                            <td><b>Mata Pelajaran</b></td>
                            <td>:</td>
                            <td>Matematika</td>
                        </tr>
                        <tr>
                            <td><b>Durasi yang dipilih</b></td>
                            <td>:</td>
                            <td>120 menit</td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <a href="#">
                        <button type="submit" class="btn btn-info">Edit Profil</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logout" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">LOGOUT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Apakah Anda yakin ingin logout ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TIDAK</button>
                    <a href="<?= BASEURL ?>"><button type="button" class="btn btn-primary">YA</button></a>
                </div>

            </div>
        </div>
    </div>
    <!--end navbar-->


    <div class="row no-gutters mt-5">
        <!--bagian sisi kiri-->
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
                <li class="nav-item">
                    <a class="nav-link active text-white" href="dashboard"><i class="fas fa-chalkboard-teacher mr-2"></i>COURSE</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="matematika"><i class="fas fa-bookmark mr-2"></i>MATEMATIKA</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="ipa"><i class="fas fa-bookmark mr-2"></i>IPA</a>
                    <hr class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="info"><i class="fas fa-bell mr-2"></i>INFO</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>