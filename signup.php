<?php
session_start();
$namaServer = "localhost";
$namaPengguna = "root";
$password = "";
$db_name = "cuanin";

$link = mysqli_connect($namaServer, $namaPengguna, $password);
mysqli_select_db($link, $db_name);

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($link, $_POST['user']);
    $password = mysqli_real_escape_string($link, $_POST['pass']);
    $nohp = mysqli_real_escape_string($link, $_POST['nohp']);
    $nama = mysqli_real_escape_string($link, $_POST['nama']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $repass = mysqli_real_escape_string($link, $_POST['repass']);
    // $pass = hash($pass);

    if ($repass != $password) {
        echo '<script> alert ("Password yang dimasukan berbeda")</script>';
        header("Refresh:0; url=signup.php");
    } else {
        $sql = "INSERT INTO user (noHp,username,password,nama,email) VALUES ('$nohp','$username','$password','$nama','$email')";
        $result = mysqli_query($link, $sql);
        if ($result) {
            session_start();
            $_SESSION['username'] = $username;
            header('location:signin.php');
        } else {
            echo "Cek data anda";
        }
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
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="css/style.css" />
</head>

<body scroll="no">
    <div class="login">
        <div class="login-row">
            <div class="login-col">
                <a class="login-logo" href="index.html"><img src="assets/logo-white.png" alt="Cuanin" /></a>
                <h1 class="login-title h1">Make your <br />business more <br />powerfull</h1>
                <div class="login-preview">
                    <img src="assets/bg-signup.png" alt="gambar signup">
                </div>
            </div>

            <!-- Form -->
            <div class="login-col">
                <a class="login-logo"><img src="assets/logo-sm.svg" alt="" /></a>
                <form action="" method="post">
                    <div class="login-form">
                        <div class="login-stage h4">Create an Account</div>
                        <div class="login-field">
                            <div class="field-label">Full Name</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="nama" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">Username</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="username" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">No. HP</div>
                            <div class="field-wrap">
                                <input class="field-input" type="number" name="nohp" />
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