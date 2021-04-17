<?php

$title = 'Halaman Form Data';

include 'layout/header.php';

?>

<!-- Isi halaman form-data -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="card col-sm-12 mb-5">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="judul"><b>Judul</b></label>
                        <input type="text" name="judul" id="judul" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="editor1"><b>Isi Konten</b></label>
                        <textarea name="isi_konten" id="editor1"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tanggal"><b>Tanggal Publish</b></label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Isi halaman form-data -->

<?php include 'layout/footer.php'; ?>