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
  $no_hp = mysqli_real_escape_string($link, $_POST['no_hp']);
  $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $repass = mysqli_real_escape_string($link, $_POST['repass']);
  // $pass = hash($pass);

  if ($repass != $password) {
    echo '<script> alert ("Password yang dimasukan berbeda")</script>';
    header("Refresh:0; url=register.html");
  } else {
    $sql = "INSERT INTO user (no_hp, username, password, fullname, email) VALUES ('$no_hp','$username','$password','$fullname','$email')";
    $result = mysqli_query($link, $sql);
    if ($result) {
      session_start();
      $_SESSION['username'] = $username;
      header('location:login.html');
    } else {
      echo "Cek data anda";
    }
  }
}
