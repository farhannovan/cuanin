<?php
session_start();
$namaServer = "localhost";
$namaPengguna = "root";
$password = "";
$conn_name = "cuanin";

$link = mysqli_connect($namaServer, $namaPengguna, $password);
mysqli_select_db($link, $conn_name);

if (isset($_POST['submit'])) {
  $fullname = mysqli_real_escape_string($link, $_POST['fullname']);
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $no_hp = mysqli_real_escape_string($link, $_POST['no_hp']);
  $email = mysqli_real_escape_string($link, $_POST['email']);
  $pass = mysqli_real_escape_string($link, $_POST['pass']);
  $repass = mysqli_real_escape_string($link, $_POST['repass']);
  // $pass = hash($pass);

  if ($repass != $pass) {
    echo '<script> alert ("Password yang dimasukan berbeda")</script>';
    header("Refresh:0; url=register.html");
  } else {
    $sql = "INSERT INTO user (fullname,username,no_hp,email,password) VALUES ('$fullname','$username','$no_hp','$email','$pass')";
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
