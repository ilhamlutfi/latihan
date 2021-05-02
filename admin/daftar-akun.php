<?php

$title = "Daftar Akun";

include 'layout/header.php';

$data_akun = query("SELECT * FROM tbl_admin");

if (isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
                alert('Data Akun Berhasil Ditambahkan');
                document.location.href = 'daftar-akun.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Akun Gagal Ditambahkan');
                document.location.href = 'daftar-akun.php';
              </script>";
    }
}

if (isset($_POST['ubah'])) {
    if (update_akun($_POST) > 0) {
        echo "<script>
                alert('Data Akun Berhasil Diubah');
                document.location.href = 'daftar-akun.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Akun Gagal Diubah');
                document.location.href = 'daftar-akun.php';
              </script>";
    }
}

?>

<!-- Isi -->
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
                        <button class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Akun</button>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Fungsi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_akun as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td>Password Ter-enkripsi</td>
                                    <td width="10%" class="text-center">
                                        <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUbah<?= $data['id_admin']; ?>">
                                            <i class="fas fa-edit" data-toggle="tooltip" title="Ubah"></i></a>

                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus<?= $data['id_admin']; ?>">
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
<!-- Isi -->

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option value="">- pilih -</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                        <button type="submit" name="tambah" class="btn btn-success btn-sm">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ubah -->
<?php foreach ($data_akun as $data) : ?>
    <div class="modal fade" id="modalUbah<?= $data['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Ubah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_admin" value="<?= $data['id_admin']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $data['username']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control" required>
                                <?php $level = $data['level']; ?>
                                <option value="1" <?= $level ==  '1' ? 'selected' : null ?>>Admin</option>
                                <option value="2" <?= $level ==  '2' ? 'selected' : null ?>>Operator</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Password <small>(Masukkan Kembali Password)</small></label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                            <button type="submit" name="ubah" class="btn btn-success btn-sm">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Hapus -->
<?php foreach ($data_akun as $data) : ?>
    <div class="modal fade" id="modalHapus<?= $data['id_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-exclamation-triangle"></i> Konfirmasi Hapus Data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin Data Akun Nama : <?= $data['nama']; ?> Akan Dihapus..???
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <a href="hapus-akun.php?id_admin=<?= $data['id_admin']; ?>" class="btn btn-danger btn-sm">Submit</a>
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