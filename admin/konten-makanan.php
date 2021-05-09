<?php

session_start();

if (!isset($_SESSION["login"])) {
    echo "<script>
            alert('Anda harus login terlebih dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}

$title = "Halaman Konten Makanan";

include 'layout/header.php';

// query menampilkan data konten yang mana kategorinya = makanan
$konten_makanan = query("SELECT * FROM tbl_konten WHERE kategori = 'Makanan'");

?>

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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi Konten</th>
                                <th>Tanggal</th>
                                <th>Fungsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($konten_makanan as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['judul']; ?></td>

                                    <td><?= limit_kata($data['isi_konten'], 100); ?> ...</td>

                                    <td><?= date('d/m/Y', strtotime($data['tanggal'])); ?></td>
                                    <td width="15%" class="text-center">
                                        <a href="detail-konten.php?id_konten=<?= $data['id_konten']; ?>" class="btn btn-secondary btn-sm"><i class="fas fa-eye" data-toggle="tooltip" title="Detail"></i></a>

                                        <a href="form-ubah.php?id_konten=<?= $data['id_konten']; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit" data-toggle="tooltip" title="Ubah"></i></a>

                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?= $data['id_konten']; ?>">
                                            <i class="fas fa-trash-alt" data-toggle="tooltip" title="Hapus"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<?php foreach ($konten_makanan as $data) : ?>
    <div class="modal fade" id="modalHapus<?= $data['id_konten']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin Data Konten Judul : <?= $data['judul']; ?> Akan Dihapus..???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <a href="hapus-konten.php?id_konten=<?= $data['id_konten']; ?>" class="btn btn-danger btn-sm">Submit</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<?php include 'layout/footer.php'; ?>