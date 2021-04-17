<?php

// Konfigurasi Database
$host       = 'localhost';
$username   = 'root'; 
$password   = ''; 
$dbname     = 'latihan1';

$db = mysqli_connect($host, $username, $password, $dbname);

if ($db) {
    echo "Database Sukses";
} else {
    echo "Database Error";
}
