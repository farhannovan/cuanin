<?php
session_start();
$namaServer = "localhost";
$namaPengguna = "root";
$password = "";
$conn_name = "cuanin";

$link = mysqli_connect($namaServer, $namaPengguna, $password);
mysqli_select_db($link, $conn_name);

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['pass'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($link, "SELECT * FROM user WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);
    $_SESSION['username'] = $username;
    header('location:dashboard.php');
} else {
    echo '<script language="javascript">';
    echo 'alert("Password atau Username yang dimasukan salah")';
    echo '</script>';
    header("Refresh:0; url=signin.php");
}
