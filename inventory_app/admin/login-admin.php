<?php
session_start();
include('../konfigurasi/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verifikasi password yang di-hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: ../index.php");
            exit;
        } else {
            $error = "Password salah le...!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Admin</title>
</head>

<style>
        /* CSS untuk menempatkan form di tengah layar */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
            background-color: #333;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
    </style>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h1 class="text-center">Login Admin</h1>
        <form action="login-admin.php" method="POST" class="mt-5 bg-light p-3 rounded">
            <div class="mb-3">
                <label for="username" class="form-label text-dark">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-dark">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <?php if (isset($error)) { echo "<p class='text-danger mt-3'>$error</p>"; } ?>
    </div>
</body>
</html>
