<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = "Halaman Detail Konten";

include 'layout/header.php';

$id_konten = (int)$_GET['id_konten'];

$data_konten = query("SELECT * FROM tbl_konten WHERE id_konten = '$id_konten'");

?>

<!-- isi -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card col-sm-12 mb-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <?php foreach ($data_konten as $data) : ?>
                            <tr>
                                <th>Judul</th>
                                <td><?= $data['judul']; ?></td>
                            </tr>
                            <tr>
                                <th>Isi Konten</th>
                                <td width="80%"><?= $data['isi_konten']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?= date('d/m/Y', strtotime($data['tanggal'])); ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><?= $data['kategori']; ?></td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td>
                                    <img src="assets/gambar/<?= $data['gambar']; ?>" alt="gambar max 2 mb" width="50%">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- isi -->

<?php include 'layout/footer.php'; ?>