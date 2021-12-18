<?php
require 'function.php';

/* ------------- SESSION ------------ */
session_start();
if (empty($_SESSION['username'])) {
    echo '<script language="javascript">';
    echo 'alert("belum login bro ?")';
    header("Refresh:0; url=signin.php");
    echo '</script>';
}

$transaksi = query("SELECT * FROM transaksi");

if (isset($_POST["tambah"])) {
    if (input($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'sales.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
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
    <title>Sales — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="css/sales.css" />
</head>

<body>
    <!-- Sidebar -->
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-head">
                <a class="sidebar-logo" href="index.html"><img src="assets/logo-black.png" alt="Cuanin" /></a>
            </div>
            <div class="sidebar-body">
                <nav class="sidebar-nav">
                    <a class="sidebar-item" href="dashboard.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/sprite.svg#icon-home"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Home</div>
                    </a>
                    <a class="sidebar-item active" href="sales.php">
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
                <a class="header-logo" href="index.html"><img src="assets/logo-sm.svg" alt="" /></a>
                <a class="header-user" href="sign-in.html"><img src="assets/ava-header.png" alt="" /></a>
            </header>

            <!-- Content -->
            <div class="sale">
                <div class="sale-container">
                    <div class="sale-stage h5 mobile-show">History Transaction</div>
                    <table cellspacing="0" cellpadding="0">
                        <thead>
                            <th>No. </th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </thead>

                        <?php $i = 1 ?>
                        <?php foreach ($transaksi as $row) : ?>
                            <tbody>
                                <tr>
                                    <td data-label="No." class="index"><?= $i; ?></td>
                                    <td data-label="Nama" class="index"><?= $row["nama"]; ?></td>
                                    <td data-label="Date" class="index"><?= $row["tanggal"]; ?></td>
                                    <td data-label="Type" class="index"><?= $row["tipe"]; ?></td>
                                    <td data-label="Amount" class="index"><?= $row["jumlah"]; ?></td>
                                    <td data-label="Action">
                                        <a href="edit.php?id=<?= $row["id"] ?>">Edit</a> |
                                        <a href="delete.php?id=<?= $row["id"]; ?>" onclick=" return confirm('Yakin ingin menghapus data?')">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>

                    <div class="btn-center">
                        <button class="btn btn-primary" onclick=" window.location.href='input.php'">Add Transaction</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>