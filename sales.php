<?php
require 'function.php';
$transaksi = query("SELECT * FROM transaksi");

if (isset($_POST["submit"])) {
    if (insert($_POST) > 0) {
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
                document.location.href = 'insert.php';
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
    <link rel="stylesheet" href="css/input.css">
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
                    <a class="sidebar-item active" href="sales.html">
                        <div class="sidebar-icon">
                            <svg class="icon icon-sale">
                                <use xlink:href="assets/sprite.svg#icon-activity"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Sales</div>
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
                    <div class="sale-stage h5 mobile-show">History</div>
                    <table cellspacing="0" cellpadding="0">
                        <tr>
                            <th>No. </th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>

                        <?php $i = 1 ?>
                        <?php foreach ($transaksi as $row) : ?>
                            <tr>
                                <td class="index"><?= $i; ?></td>
                                <td class="index"><?= $row["nama"]; ?></td>
                                <td class="index"><?= $row["tanggal"]; ?></td>
                                <td class="index"><?= $row["tipe"]; ?></td>
                                <td class="index"><?= $row["jumlah"]; ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row["id"] ?>">Edit</a> |
                                    <a href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>

                    <div class="add">
                        <button class="add-btn btn btn-primary" onclick=" window.location.href='#input'">Add Transaction</button>
                    </div>

                    <div id="input" class="overlay">
                        <div class="popup">
                            <h2>Add Transaction</h2>
                            <a class="close" href="#">&times;</a>
                            <div class="content">
                                <form action="" method="post">
                                    <!-- <table>
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td><input type="text" name="nama" id="nama" required></td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>:</td>
                                            <td><input type="date" name="tanggal" id="tanggal" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>:</td>
                                            <td>
                                                <select name="tipe" value="tipe" id="tipe" required>
                                                    <option value="Pengeluaran">Pengeluaran</option>
                                                    <option value="Pemasukkan">Pemasukkan</option>
                                                    <option value="Hutang">Hutang</option>
                                                    <option value="Piutang">Piutang</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Amount</td>
                                            <td>:</td>
                                            <td><input type="number" name="jumlah" id="jumlah" required>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <button type="submit" name="submit">Add</button>
                                            </td>
                                        </tr>
                                    </table> -->
                                    <div class="login-field">
                                        <div class="field-label">Name</div>
                                        <div class="field-wrap">
                                            <td><input class="field-input" type="text" name="nama" id="nama" required></td>
                                        </div>
                                    </div>
                                    <div class="login-field">
                                        <div class="field-label">Amount</div>
                                        <div class="field-wrap">
                                            <input class="field-input" type="number" name="jumlah" id="jumlah" required>
                                        </div>
                                    </div>
                                    <div class="login-field">
                                        <div class="field-label">Date</div>
                                        <div class="field-wrap">
                                            <input class="field-input" type="date" name="tanggal" id="tanggal" required>
                                        </div>
                                    </div>
                                    <div class="login-field">
                                        <div class="field-label">Type</div>
                                        <div class="field-wrap">
                                            <select class="field-input" name="tipe" value="tipe" id="tipe" required>
                                                <option value="Pengeluaran">Pengeluaran</option>
                                                <option value="Pemasukkan">Pemasukkan</option>
                                                <option value="Hutang">Hutang</option>
                                                <option value="Piutang">Piutang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <a class="btn btn-primary btn-wide" href="dashboard.html">Sign in</a> -->
                                    <button type="submit" name="submit">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>