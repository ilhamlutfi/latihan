<?php

$title = "Daftar Akun";

include 'layout/header.php';

$data_akun = query("SELECT * FROM tbl_admin");

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
                        <button class="btn btn-success btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Akun</button>
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
                                    <td width="15%" class="text-center">
                                        <a href="" class="btn btn-secondary btn-sm"><i class="fas fa-eye" data-toggle="tooltip" title="Detail"></i></a>

                                        <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit" data-toggle="tooltip" title="Ubah"></i></a>

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
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i> Tambah Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>

<?php include 'layout/footer.php'; ?>