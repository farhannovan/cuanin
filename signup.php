<?php
include 'config/function.php';

error_reporting(0);
session_start();

/* ---------- DAFTAR BIASA ---------- */
/* 
$namaServer = "localhost";
$namaPengguna = "root";
$password = "";
$conn_name = "cuanin";

$link = mysqli_connect($namaServer, $namaPengguna, $password);
mysqli_select_db($link, $conn_name);

if (isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $no_hp = mysqli_real_escape_string($link, $_POST['no_hp']);
    $pass = mysqli_real_escape_string($link, $_POST['pass']);
    $repass = mysqli_real_escape_string($link, $_POST['repass']);
    // $pass = hash($pass);

    if ($repass != $pass) {
        echo '<script> alert ("Password yang dimasukan berbeda")</script>';
        header("Refresh:0; url=signup.php");
    } else {
        // $sql = "INSERT INTO user (no_hp,username,password,fullname,email) VALUES ('$no_hp','$username','$password','$fullname','$email')";
        $sql = "INSERT INTO user (fullname,username,no_hp,email,password) VALUES ('$fullname','$username','$no_hp','$email','$pass')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            session_start();
            $_SESSION['username'] = $username;
            header('location:signin.php');
        } else {
            echo "Cek data anda";
        }
    }
} */

/* --- DAFTAR DENGAN PASSWORD HASH -- */
if (isset($_POST["submit"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sign Up — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="assets/css/signin.css" />
</head>

<body scroll="no">
    <div class="login">
        <div class="login-row">
            <div class="login-col">
                <a class="login-logo" href="index.html"><img src="assets/img/logo-white.png" alt="Cuanin" /></a>
                <h1 class="login-title h1">Make your <br />business more <br />powerfull</h1>
                <div class="login-preview">
                    <img src="assets/img/bg-signup.png" alt="gambar signup">
                </div>
            </div>

            <!-- Form -->
            <div class="login-col">
                <a class="login-logo"><img src="assets/img/logo-sm.svg" alt="" /></a>
                <form action="" method="post">
                    <div class="login-form">
                        <div class="login-stage h4">Create an Account</div>
                        <div class="login-field">
                            <div class="field-label">Full Name</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="fullname" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">User Name</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="username" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">No. HP</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="no_hp" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">Email</div>
                            <div class="field-wrap">
                                <input class="field-input" type="email" name="email" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">Password</div>
                            <div class="field-wrap">
                                <input class="field-input" type="password" name="pass" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">Confirm Password</div>
                            <div class="field-wrap">
                                <input class="field-input" type="password" name="repass" />
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary btn-wide" href="signin.php">Sign Up</a> -->
                        <button class="btn btn-primary btn-wide" type="submit" name="submit">Sign
                            Up</button>
                        <div class="login-flex">
                            <a class="login-link" href="signin.php">Already have account?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function goTo() {
            location.replace("index.html");
        }
    </script>
</body>

</html>