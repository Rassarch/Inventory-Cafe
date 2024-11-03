<?php
    include "../konfigurasi/db.php";
    
    // mengambil data dari input
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // cek apakah password dikonfirmasi
    if ($password != $konfirmasi_password) {
        die("Password nya ga sama le...");
    }

    // enkripsi password terlebih dahulu
    $password_enkripsi = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO admin(username, password) VALUES('$username', '$password_enkripsi')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {

        header('location: ../admin/login-admin.php');
    }

?>