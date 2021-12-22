<?php
include 'config/function.php';

error_reporting(0);
session_start();

/* ----------- LOGIN BIASA ---------- */
/* if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
    $num_rows = mysqli_num_rows($query);
    $row = mysqli_fetch_array($query);
    $_SESSION['username'] = $row['username'];
    if ($num_rows > 0) {
        echo "
            <script>
                document.location = 'dashboard.php'
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Username atau Password salah');
                document.location = 'signin.php'
            </script>
        ";
    }
} */

/* --- LOGIN DENGAN PASSWORD HASH --- */
// Jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin.
if (isset($_SESSION['username'])) {
    header("location: dashboard.php");
}

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password.
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $pass = $_POST['password']; // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    $sql = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");

    list($username, $password) = mysqli_fetch_array($sql);

    // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
    if (mysqli_num_rows($sql) > 0) {

        /*
            Validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
        */
        if (password_verify($pass, $password)) {

            // Buat session baru.
            session_start();
            $_SESSION['username'] = $username;
            // $_SESSION['nama']     = $nama;

            // Jika login berhasil, user akan diarahkan ke halaman admin.
            header("location: signin.php");
            die();
        } else {
            echo '<script language="javascript">
                    window.alert("LOGIN GAGAL! Silakan coba lagi");
                    window.location.href="signin.php";
                  </script>';
        }
    } else {
        echo '<script language="javascript">
                window.alert("LOGIN GAGAL! Silakan coba lagi");
                window.location.href="signin.php";
             </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sign In — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="assets/css/signin.css" />
</head>

<body>
    <div class="login">
        <div class="login-row">
            <div class="login-col">
                <a class="login-logo" href="index.html"><img src="assets/img/logo-white.png" alt="Cuanin" /></a>
                <h1 class="login-title h1">Make your <br />business more <br />powerfull</h1>
                <div class="login-preview">
                    <img src="assets/img/bg2.png" alt="gambar-2">
                </div>
            </div>

            <!-- Form -->
            <div class="login-col">
                <a class="login-logo"><img src="assets/img/logo-sm.svg" alt="" /></a>
                <form action="" method="post">
                    <div class="login-form">
                        <div class="login-stage h4">Sign in to Cuanin</div>
                        <div class="login-field">
                            <div class="field-label">Username</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="username" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">Password</div>
                            <div class="field-wrap">
                                <input class="field-input" type="password" name="password" />
                            </div>
                        </div>
                        <button class="btn btn-primary btn-wide" type="submit" name="submit">Sign In</button>
                        <div class="login-flex">
                            <div class="login-text">Not a member?</div>
                            <a class="login-link" type="submit" name="signup" id="" onclick="goTo2()">Click here to
                                signup</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function goTo2() {
            location.replace("signup.php");
        }

        function back() {
            location.replace("index.html");
        }
    </script>
</body>

</html>