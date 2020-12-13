<br><br>
<div class="col-md-12 p-5 pt-2">
    <h3><i class="fas fa-bookmark mr-2"></i>MY TUTOR</h3>
    <hr>
    <div class="row">
        <?php if (isset($data)) foreach ($data as $tutor) : ?>
            <div class="card mb-3 ml-5 shadow p-3 mb-5 bg-white rounded" style="width: 900px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= BASEURL ?>asset/tutor/foto/<?= $tutor['foto'] ?>" class="card-img p-3" style="width: 280px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body pt-1">
                            <h5 class="card-title">Identitas Tutor</h5>
                            <table style="width: 500px;">
                                <tr>
                                    <td><b>Nama Lengkap</b></td>
                                    <td>:</td>
                                    <td><?= $tutor['nama'] ?></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td><b>Durasi yang dipilih</b></td>
                                    <td>:</td>
                                    <td><?= $tutor['durasi'] ?></td>
                                </tr>
                                <td><b>Mata Pelajaran</b></td>
                                <td>:</td>
                                <td><?= $tutor['mapel'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Lokasi Belajar</b></td>
                                    <td>:</td>
                                    <td><?= $tutor['lokasibelajar'] ?>h</td>
                                </tr>
                            </table>
                            <br>
                            <a href="detailtutor/<?= $tutor['id'] ?>/cs" class="detailtutor">
                                <p class="card-text text-info">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="pl-5">
        <a class="btn btn-primary" href="dashboard" role="button">KEMBALI</a>
    </div>