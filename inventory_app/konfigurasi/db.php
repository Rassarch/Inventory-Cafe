<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inventory";

    // membuat koneksi
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // memeriksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>