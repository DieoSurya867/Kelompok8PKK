<?php

//server gita 
$db_servername = "localhost";

//$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "perpustakaan_kelompok8";

$db = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

if ($db) {
} else {
    echo "Koneksi gagal";
}
