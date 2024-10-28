<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "kampus";
$con = mysqli_connect($host, $username, $password, $database);
define('BASE_URL', 'http://localhost/belajar/database/pertemuan1/');

include 'mahasiswa/mahasiswaController.php';
include 'user/userController.php';
include 'mapel/mapelController.php';
