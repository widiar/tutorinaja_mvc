<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style_tutor.css">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css">

  <title>Dashboard Tutor</title>
</head>

<body>
  <!--navbar-->
  <?php include 'dashboard_tutor/navbar.php' ?>
  <!--end navbar-->

  <div class="row no-gutters mt-5">

    <!--bagian sisi kiri-->
    <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
      <ul class="nav flex-column ml-3 mb-5">
        <li class="nav-item">
          <a class="nav-link active text-white" href="dashboard_tutor.html"><i class="fas fa-chalkboard-teacher mr-2"></i>Course</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="matematika.html"><i class="fas fa-bookmark mr-2"></i>Matematika</a>
          <hr class="bg-secondary">
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="ipa.html"><i class="fas fa-bookmark mr-2"></i>IPA</a>
          <hr class="bg-secondary">
        </li>
      </ul>
    </div>

    <!--bagian sisi kanan-->
    <div class="col-md-10 p-5 pt-2">
      <h3><i class="fas fa-bookmark mr-2"></i>MATEMATIKA</h3>
      <hr>
      <div class="row">
        <!--siswa pertama-->
        <div class="card mb-3 ml-5 shadow p-3 mb-5 bg-white rounded" style="max-width: 900px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/orang.jpg" class="card-img p-3" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body pt-1">
                <h5 class="card-title">Identitas Siswa</h5>
                <table style="width: 500px;">
                  <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td>Putu Indah Sari</td>
                  </tr>
                  <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td>VI SD</td>
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
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td>Jalan Gatot Subroto</td>
                  </tr>
                </table>

                <a href="" data-toggle="modal" data-target="#modalprofil">
                  <p class="card-text text-info">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
                <!--pop up-->
                <div class="modal fade" id="modalprofil" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Profil Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" style="width: 1000px" class="posisi" ;>
                          <fieldset class="h" />
                          <table style="width: 980px;">
                            <tr>
                              <td rowspan="15" width="250px">
                                <img src="img/orang.jpg" width="220px" height="220px" />
                              </td>
                            </tr>
                            <tr>
                              <td><b>Nama Lengkap</b></td>
                              <td>:</td>
                              <td>Indah Sari</td>
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
                              <td>8 Oktober 2010</td>
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
                          </fieldset>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Terima</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                      </div>
                    </div>
                  </div>
                </div>
                <h6 class="card-title">Status : Belum Dikonfirmasi</h6>
              </div>
            </div>
          </div>
        </div>

        <!--siswa kedua-->

        <div class="card mb-3 ml-5 shadow p-3 mb-5 bg-white rounded" style="max-width: 900px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/orang.jpg" class="card-img p-3" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body pt-1">
                <h5 class="card-title">Identitas Siswa</h5>
                <table style="width: 500px;">
                  <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td>Putu Indah Sari</td>
                  </tr>
                  <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td>VI SD</td>
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
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td>Jalan Gatot Subroto</td>
                  </tr>
                </table>

                <a href="" data-toggle="modal" data-target="#modalprofil">
                  <p class="card-text text-info">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
                <!--pop up-->
                <div class="modal fade" id="modalprofil" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Profil Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" style="width: 1000px" class="posisi" ;>
                          <fieldset class="h" />
                          <table style="width: 980px;">
                            <tr>
                              <td rowspan="15" width="250px">
                                <img src="img/orang.jpg" width="220px" height="220px" />
                              </td>
                            </tr>
                            <tr>
                              <td><b>Nama Lengkap</b></td>
                              <td>:</td>
                              <td>Indah Sari</td>
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
                              <td>8 Oktober 2010</td>
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
                          </fieldset>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Terima</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                      </div>
                    </div>
                  </div>
                </div>
                <h6 class="card-title">Status : Belum Dikonfirmasi</h6>
              </div>
            </div>
          </div>
        </div>

        <!--siswa ketiga-->
        <div class="card mb-3 ml-5 shadow p-3 mb-5 bg-white rounded" style="max-width: 900px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="img/orang.jpg" class="card-img p-3" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body pt-1">
                <h5 class="card-title">Identitas Siswa</h5>
                <table style="width: 500px;">
                  <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td>Putu Indah Sari</td>
                  </tr>
                  <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td>VI SD</td>
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
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td>Jalan Gatot Subroto</td>
                  </tr>
                </table>

                <a href="" data-toggle="modal" data-target="#modalprofil">
                  <p class="card-text text-info">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
                <!--pop up-->
                <div class="modal fade" id="modalprofil" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Profil Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="#" style="width: 1000px" class="posisi" ;>
                          <fieldset class="h" />
                          <table style="width: 980px;">
                            <tr>
                              <td rowspan="15" width="250px">
                                <img src="img/orang.jpg" width="220px" height="220px" />
                              </td>
                            </tr>
                            <tr>
                              <td><b>Nama Lengkap</b></td>
                              <td>:</td>
                              <td>Indah Sari</td>
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
                              <td>8 Oktober 2010</td>
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
                          </fieldset>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Terima</button>
                        <button type="submit" class="btn btn-danger">Tolak</button>
                      </div>
                    </div>
                  </div>
                </div>
                <h6 class="card-title">Status : Belum Dikonfirmasi</h6>
              </div>
            </div>
          </div>
        </div>


      </div>

    </div>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.bundle.js"></script>
</body>

</html>