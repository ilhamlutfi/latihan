<?php

$title = 'Halaman Form Ubah'; // judul halaman

include 'layout/header.php'; // memanggil file header.php di dlm folder layout

$id_konten = (int)$_GET['id_konten'];

$data_konten = query("SELECT * FROM tbl_konten WHERE id_konten = '$id_konten'")[0];

// jika tombol ubah di tekan, jalankan perintah dibawah ini
if (isset($_POST['ubah'])) {
    if (update_data($_POST) > 0) {
        echo "<script>
                alert('Data Konten Berhasil Diubah');
                document.location.href = 'form-ubah.php?id_konten=$id_konten';
              </script>";
    } else {
        echo "<script>
                alert('Data Konten Gagal Diubah');
                document.location.href = 'form-ubah.php?id_konten=$id_konten';
              </script>";
    }
}

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
                <form action="" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id_konten" value="<?= $data_konten['id_konten']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $data_konten['gambar']; ?>">

                    <div class="form-group">
                        <label for="judul"><b>Judul</b></label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?= $data_konten['judul']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="editor1"><b>Isi Konten</b></label>
                        <textarea name="isi_konten" id="editor1" required><?= $data_konten['isi_konten']; ?></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="tanggal"><b>Tanggal Publish</b></label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $data_konten['tanggal']; ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="kategori"><b>Kategori</b></label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <?php $kategori = $data_konten['kategori'] ?? $data_konten['kategori'] ?>
                                <option value="Makanan" <?= $kategori == 'Makanan' ? 'selected' : '' ?>>Makanan</option>
                                <option value="Olahraga" <?= $kategori == 'Olahraga' ? 'selected' : '' ?>>Olahraga</option>
                                <option value="Pendidikan" <?= $kategori == 'Pendidikan' ? 'selected' : '' ?>>Pendidikan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="gambar"><b>Gambar <small>(Max 2 MB</small></b></label><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImg()">
                                <label class="custom-file-label" for="gambar"><?= $data_konten['gambar']; ?></label>
                            </div>
                            <div class="mt-1">
                                <img src="assets/gambar/<?= $data_konten['gambar']; ?>" alt="" class="img-thumbnail img-preview" width="100px">
                            </div>
                        </div>
                    </div>

                    <button name="ubah" type="submit" class="btn btn-success float-right mt-3">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Isi halaman form-data -->

<script type="text/javascript">
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        gambarLabel.textContent = gambar.files[0].name;

        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?php include 'layout/footer.php'; ?>