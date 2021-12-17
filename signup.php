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
  $toko = mysqli_real_escape_string($link, $_POST['toko']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $repass = mysqli_real_escape_string($link, $_POST['repass']);
  // $pass = hash($pass);

  if ($repass != $password) {
    echo '<script> alert ("Password yang dimasukan berbeda")</script>';
    header("Refresh:0; url=signup.html");
  } else {
    $sql = "INSERT INTO user (noHp,username,password,nama_toko,email) VALUES ('$nohp','$username','$password','$toko','$email')";
    $result = mysqli_query($link, $sql);
    if ($result) {
      session_start();
      $_SESSION['username'] = $username;
      header('location:sign-in.html');
    } else {
      echo "Cek data anda";
    }
  }
}
