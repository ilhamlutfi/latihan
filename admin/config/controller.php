<?php

// fungsi tambah konten 
function create_data($data)
{
    global $db; // memanggil koneksi ke database dgn variabel $db
    // menerima inputan dari form
    $judul             = $data['judul'];
    $isi_konten        = $data['isi_konten'];
    $tanggal           = $data['tanggal'];
    $kategori          = $data['kategori'];

    // upload gambar 
    $gambar = upload_gambar_konten(); // memanggil function upload_gambar_konten
    if (!$gambar) {
        return false;
    }

    $query  = "INSERT INTO tbl_konten VALUES(null, '$judul', '$isi_konten', '$tanggal', '$kategori', '$gambar')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi menampilkan konten
function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi upload gambar konten
function upload_gambar_konten()
{
    $namaFile       = $_FILES['gambar']['name']; //nama file (gambar)
    $ukuranFile     = $_FILES['gambar']['size']; // ukuran data (gambar)
    $error          = $_FILES['gambar']['error']; // jika gambar error
    $tmpName        = $_FILES['gambar']['tmp_name']; //tempat penyimpanan sementara

    // Check file yg diupload
    $extensiGambarValid = ['jpg', 'jpeg', 'png']; // menentukan extensi gambar
    $extensiGambar      = explode('.', $namaFile);
    $extensiGambar      = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $extensiGambarValid)) {
        // pesan gagal
        echo "<script>
                alert('Format Gambar Tidak VALID');
                document.location.href = 'form-data.php';
            </script>";
        die();
    }

    // jika ukuran melampaui batas maksimal
    if ($ukuranFile > 2048000) { // batas 2 mb
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar');
                document.location.href = 'form-data.php';
            </script>";
        die();
    }

    // memindahkan data yg di upload ke folder gambar
    move_uploaded_file($tmpName, 'assets/gambar/' . $namaFile);
    return $namaFile;
}

// fungsi limit batas karakter
function limit_kata($string, $word_limit)
{
    $word_limit = $word_limit; // batas karakter
    $cetak = substr($string, 0, $word_limit);
    return $cetak;
}

// fungsi ubah konten 
function update_data($data)
{
    global $db; // memanggil koneksi ke database dgn variabel $db
    // menerima inputan dari form
    $judul             = $data['judul'];
    $isi_konten        = $data['isi_konten'];
    $tanggal           = $data['tanggal'];
    $kategori          = $data['kategori'];
    $id_konten         = $data['id_konten'];
    $gambarLama        = $data['gambarLama'];

    // check gambar di ubah atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama; // jika tidak pakai gambar lama
    } else {
        $gambar = upload_gambar_konten(); // jika diubah pakai gambar baru
    }

    $query  = "UPDATE tbl_konten SET judul = '$judul', isi_konten = '$isi_konten', tanggal = '$tanggal', kategori = '$kategori', gambar = '$gambar' WHERE id_konten = $id_konten";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
