<?php

session_start();

if (isset($_SESSION['login'])) {
    $id_admin   = $_SESSION["id_admin"];
    $nama       = $_SESSION["nama"];
    $username   = $_SESSION["username"];
    $level      = $_SESSION["level"];
}

require 'controller.php';
require 'database.php';
