<?php
require 'function.php';

$id = $_GET["id"];
$ambildata = mysqli_query($conn, "SELECT * FROM transaksi WHERE id = $id");
$upd = mysqli_fetch_array($ambildata);

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $jumlah = $_POST["jumlah"];
    $tanggal = $_POST["tanggal"];
    $tipe = $_POST["tipe"];

    mysqli_query($conn, "UPDATE transaksi SET nama = '$nama', jumlah = '$jumlah', tanggal = '$tanggal', tipe = '$tipe' WHERE id = $id") or die(mysqli_error($conn));

    echo "
        <script>
            alert('Data berhasil diedit!');
            document.location.href = 'Sales.php';
        </script>
    ";
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
                    <div class="sale-stage h5 mobile-show"><strong>Input Transaction</strong></div>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $upd["id"] ?>">
                        <div class="input-fieldset">
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Name</div>
                                    <div class="input-wrap"><input type="text" name="nama" id="nama" required value="<?php echo $upd["nama"] ?>"></div>
                                </div>
                                <div class="input-field">
                                    <div class="input-label">Amount</div>
                                    <div class="input-wrap"><input type="number" name="jumlah" id="jumlah" required value="<?php echo $upd["jumlah"] ?>"></div>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Date</div>
                                    <div class="input-wrap"><input type="date" name="tanggal" id="tanggal" required value="<?php echo $upd["tanggal"] ?>">
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-label">Type</div>
                                    <div class="input-wrap"><select name="tipe" value="tipe" id="tipe" required value="<?php echo $upd["tipe"] ?>">
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
                                <button class="btn btn-primary" type="submit" name="update" value="update">Update Transaction</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>