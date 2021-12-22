<?php
include 'config/function.php';

error_reporting(0);
session_start();

if (empty($_SESSION['username'])) {
    echo '<script language="javascript">';
    echo 'alert("Maaf, anda belum login")';
    header("Refresh:0; url=signin.php");
    echo '</script>';
}

$transaksi = query("SELECT * FROM transaksi");

if (isset($_POST["tambah"])) {
    if (input($_POST) > 0) {
        echo "
            <script>
                alert('Transaksi berhasil ditambahkan');
                document.location.href = 'transaction.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Transaksi gagal ditambahkan');
                document.location.href = 'input.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Input Transaction — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="assets/css/transaction.css" />
</head>

<body>
    <!-- Sidebar -->
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-head">
                <img src="assets/img/logo-black.png" class="sidebar-logo" alt="Cuanin" />
            </div>
            <div class="sidebar-body">
                <nav class="sidebar-nav">
                    <a class="sidebar-item" href="dashboard.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/img/sprite.svg#icon-home"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Home</div>
                    </a>
                    <a class="sidebar-item active" href="transaction.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-transaction">
                                <use xlink:href="assets/img/sprite.svg#icon-activity"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Transaction</div>
                    </a>
                    <a class="sidebar-item" href="setting.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/img/sprite.svg#icon-settings"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Setting</div>
                    </a>
                    <a class="sidebar-item" href="signout.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g>
                                    <path d="M0,0h24v24H0V0z" fill="none" />
                                </g>
                                <g>
                                    <path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z" />
                                </g>
                            </svg>
                        </div>
                        <div class="sidebar-text">Sign Out</div>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Header -->
        <div class="page-content">
            <header>
                <a class="header-logo" href=""><img src="assets/img/logo-sm.svg" alt="" /></a>
                <h3 class="header-username">Hi, <?php echo $_SESSION['username'] ?> </h3>
                <a class="header-ava" href="setting.php"><img src="assets/img/ava-header.png" alt="" /></a>
            </header>

            <!-- Content -->
            <div class="transaction">
                <div class="transaction-container">
                    <div class="transaction-stage h5 mobile-show"><strong>Input Transaksi</strong></div>
                    <form action="" method="post">
                        <div class="input-fieldset">
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Nama Transaksi</div>
                                    <div class="input-wrap"><input type="text" name="nama" id="nama" required></div>
                                </div>
                                <div class="input-field">
                                    <div class="input-label">Jumlah</div>
                                    <div class="input-wrap"><input type="number" name="jumlah" id="jumlah" required></div>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Tanggal</div>
                                    <div class="input-wrap"><input type="date" name="tanggal" id="tanggal" required>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-label">Tipe</div>
                                    <div class="input-wrap"><select name="tipe" value="tipe" id="tipe" required>
                                            <!-- <option value="none" selected disabled hidden>Select a type</option> -->
                                            <option value="Pengeluaran">Pengeluaran</option>
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Hutang">Hutang</option>
                                            <option value="Piutang">Piutang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-right">
                                <button class="btn btn-primary" type="submit" name="tambah" value="tambah">Tambah Transaksi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("tipe").selectedIndex = -1;
    </script>
</body>

</html>