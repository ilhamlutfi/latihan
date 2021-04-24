<?php

$title = 'Halaman Form Data'; // judul halaman

include 'layout/header.php'; // memanggil file header.php di dlm folder layout

// jika tombol tambah di tekan, jalankan perintah dibawah ini
if (isset($_POST['tambah'])) {
    if (create_data($_POST) > 0) {
        echo "<script>
                alert('Data Konten Berhasil Ditambahkan');
                document.location.href = 'form-data.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Konten Gagal Ditambahkan');
                document.location.href = 'form-data.php';
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
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="judul"><b>Judul</b></label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="editor1"><b>Isi Konten</b></label>
                        <textarea name="isi_konten" id="editor1" required></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="tanggal"><b>Tanggal Publish</b></label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="kategori"><b>Kategori</b></label>
                            <select name="kategori" id="kategori" class="form-control" required>
                                <option value="">-- pilih --</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Olahraga">Olahraga</option>
                                <option value="Pendidikan">Pendidikan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="gambar"><b>Gambar</b></label><br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewImg()" required>
                                <label class="custom-file-label" for="gambar">Pilih gambar...</label>
                            </div>
                            <div class="mt-1">
                                <img src="" alt="" class="img-thumbnail img-preview" width="100px">
                            </div>
                        </div>
                    </div>

                    <button name="tambah" type="submit" class="btn btn-success float-right mt-3">Tambah</button>
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