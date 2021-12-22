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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="assets/css/dashboard.css" />
</head>

<body>
    <!-- Sidebar -->
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-head">
                <!-- <a class="sidebar-logo" href="index.html"> -->
                <img src="assets/img/logo-black.png" class="sidebar-logo" alt="Cuanin" />
                <!-- </a> -->
            </div>
            <div class="sidebar-body">
                <nav class="sidebar-nav">
                    <a class="sidebar-item active" href="dashboard.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/img/sprite.svg#icon-home"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Home</div>
                    </a>
                    <a class="sidebar-item" href="transaction.php">
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
                    <a class="sidebar-item" href="signout.php" onclick="return confirm('Apakah kamu yakin untuk keluar?');">
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
                <a class="header-logo" href=""><img src="assets/img/logo-sm.svg" alt="logo" /></a>
                <h3 class="header-username">Hi, <?php echo $_SESSION['username'] ?> </h3>
                <a class="header-ava" href="setting.php"><img src="assets/img/ava-header.png" alt="avatar" /></a>
            </header>

            <!-- Content -->
            <div class="page-container">
                <div class="banner">
                    <div class="banner-container">
                        <div class="banner-wrap">
                            <div class="banner-title h2">Dashboard</div>
                            <div class="banner-info h5">Atur keuanganmu sekarang juga!</div>
                        </div>
                        <div class="banner-preview"><img src="assets/img/figures-2.png" alt="" /></div>
                    </div>
                </div>

                <!-- Widget -->
                <div class="widget">
                    <div class="widget-item">
                        <div class="widget-head">
                            <div class="widget-type">
                                <div class="widget-logo">
                                    <img src="assets/img/widget-transaksi.png" alt="" />
                                </div>
                                <div class="widget-details">
                                    <div class="widget-category">Total Transaksi</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-line">
                                <?php
                                error_reporting(0);
                                $transaction = mysqli_query($conn, "SELECT jumlah FROM transaksi");
                                while ($result = mysqli_fetch_array($transaction)) {
                                    $total += $result['jumlah'];
                                    $rupiah = rupiah($total);
                                }
                                echo "<div class='h4'>$rupiah</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="widget-item">
                        <div class="widget-head">
                            <div class="widget-type">
                                <div class="widget-logo">
                                    <img src="assets/img/widget-pendapatan.png" alt="" />
                                </div>
                                <div class="widget-details">
                                    <div class="widget-category">Pendapatan</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-line">
                                <?php
                                // Jumlah Admin
                                /* $admin = "SELECT id FROM user ORDER BY id";
                                $adm = mysqli_query($conn, $admin);
                                $jml = mysqli_num_rows($adm);
                                echo "<div class='h4'>$jml Admin</div>"; */
                                ?>
                                <?php
                                error_reporting(0);
                                $pemasukan = mysqli_query($conn, "SELECT jumlah FROM transaksi WHERE tipe IN ('pemasukan', 'hutang')");
                                while ($revenue = mysqli_fetch_array($pemasukan)) {
                                    $total_revenue += $revenue['jumlah'];
                                    $rupiah = rupiah($total_revenue);
                                }
                                echo "<div class='h4'>$rupiah</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="widget-item">
                        <div class="widget-head">
                            <div class="widget-type">
                                <div class="widget-logo">
                                    <img src="assets/img/widget-pengeluaran.png" alt="" />
                                </div>
                                <div class="widget-details">
                                    <div class="widget-category">Pengeluaran</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-line">
                                <?php
                                /* $transaksi = "SELECT id FROM transaksi ORDER BY id";
                                $trans = mysqli_query($conn, $transaksi);
                                $jml = mysqli_num_rows($trans);
                                echo "<div class='h4'>$jml Transaction</div>"; */
                                ?>
                                <?php
                                error_reporting(0);
                                $pengeluaran = mysqli_query($conn, "SELECT jumlah FROM transaksi WHERE tipe IN ('pengeluaran', 'piutang')");
                                while ($expense = mysqli_fetch_array($pengeluaran)) {
                                    $total_expense += $expense['jumlah'];
                                    $rupiah = rupiah($total_expense);
                                }
                                echo "<div class='h4'>$rupiah</div>";
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>