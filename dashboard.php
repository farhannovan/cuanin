<?php
require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="css/dashboard.css" />
</head>

<body>
    <!-- Sidebar -->
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-head">
                <a class="sidebar-logo" href="#"><img src="assets/logo-black.png" alt="Cuanin" /></a>
            </div>
            <div class="sidebar-body">
                <nav class="sidebar-nav">
                    <a class="sidebar-item active" href="dashboard.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/sprite.svg#icon-home"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Home</div>
                    </a>
                    <a class="sidebar-item" href="sales.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-sale">
                                <use xlink:href="assets/sprite.svg#icon-activity"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Sales</div>
                    </a>
                    <a class="sidebar-item" href="setting.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/sprite.svg#icon-settings"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Settings</div>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Header -->
        <div class="page-content">
            <header>
                <a class="header-logo" href="index.html"><img src="assets/logo-sm.svg" alt="" /></a>
                <a class="header-user" href="sign-in.html"><img src="assets/ava-header.png" alt="" /></a>
            </header>

            <!-- Content -->
            <div class="page-container">
                <div class="banner">
                    <div class="banner-container">
                        <div class="banner-wrap">
                            <div class="banner-title h2">Dashboard</div>
                            <div class="banner-info h5">Look what you have made today!</div>
                        </div>
                        <div class="banner-preview"><img src="assets/figures-2.png" alt="" /></div>
                    </div>
                </div>

                <!-- Widget -->
                <div class="widget">
                    <div class="widget-item">
                        <div class="widget-head">
                            <div class="widget-type">
                                <div class="widget-logo">
                                    <img src="assets/widget-sales.png" alt="" />
                                </div>
                                <div class="widget-details">
                                    <div class="widget-category">Sales</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-line">
                                <?php
                                error_reporting(E_ALL ^ E_NOTICE);
                                $sales = mysqli_query($conn, "SELECT jumlah FROM transaksi");
                                while ($result = mysqli_fetch_array($sales)) {
                                    $total += $result['jumlah'];
                                }
                                echo "<div class='h4'>Rp$total</div>";
                                ?>
                                <!-- <div class="h4">Rp100.570.000</div> -->
                            </div>
                        </div>
                    </div>
                    <div class="widget-item">
                        <div class="widget-head">
                            <div class="widget-type">
                                <div class="widget-logo">
                                    <img src="assets/widget-revenue.png" alt="" />
                                </div>
                                <div class="widget-details">
                                    <div class="widget-category">Revenue</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-line">
                                <div class="h4">Rp16.500.000</div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-item">
                        <div class="widget-head">
                            <div class="widget-type">
                                <div class="widget-logo">
                                    <img src="assets/widget-customer.png" alt="" />
                                </div>
                                <div class="widget-details">
                                    <div class="widget-category">Customer</div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-line">
                                <?php
                                $user = "SELECT id FROM transaksi ORDER BY id";
                                $usr = mysqli_query($conn, $user);
                                $jml = mysqli_num_rows($usr);
                                echo "<div class='h4'>$jml Customer</div>";
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