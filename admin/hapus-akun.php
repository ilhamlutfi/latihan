<?php

require 'config/config.php';

$id_admin = (int)$_GET['id_admin'];

if (delete_akun($id_admin) > 0) {
    echo "<script>
            alert('Data Akun Berhasil Dihapus');
            document.location.href = 'daftar-akun.php';
          </script>";
} else {
    echo "<script>
            alert('Data Akun Gagal Dihapus');
            document.location.href = 'daftar-akun.php';
          </script>";
}
