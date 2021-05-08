<?php
session_start();

//menghilangkan session
$_SESSION = [];

session_unset();
session_destroy();
header('Location:login.php');
