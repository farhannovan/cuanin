<?php
include 'config/function.php';

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
            document.location.href = 'transaction.php';
        </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Edit Transaksi — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" href="css/input.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>
                Edit Data
            </h1>
        </header>
        <div class="content">
            <aside>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="transaction.php">transaction</a></li>
                </ul>
            </aside>
            <div class="form">
                <div>
                    <div>
                        <h4>Edit Data Transaksi</h4>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $upd["id"] ?>">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" id="nama" required value="<?php echo $upd["nama"] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>:</td>
                                    <td><input type="number" name="jumlah" id="jumlah" required value="<?php echo $upd["jumlah"] ?>"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td><input type="date" name="tanggal" id="tanggal" required value="<?php echo $upd["tanggal"] ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tipe</td>
                                    <td>:</td>
                                    <td>
                                        <select name="tipe" value="tipe" id="tipe" required value="<?php echo $upd["tipe"] ?>">
                                            <option value="Pengeluaran">Pengeluaran</option>
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Hutang">Hutang</option>
                                            <option value="Piutang">Piutang</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="update" value="update">Edit Data</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>