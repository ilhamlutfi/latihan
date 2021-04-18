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

    $query  = "INSERT INTO tbl_konten VALUES(null, '$judul', '$isi_konten', '$tanggal', '$kategori')";
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