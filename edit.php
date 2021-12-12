<?php
require 'function.php';

$id = $_GET["id"];

$upd = query("SELECT * FROM transaksi WHERE id = $id")[0];

if (isset($_POST["update"])) {
    if (edit($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diedit!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diedit!');
                document.location.href = 'insert.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="css/insert.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>
                Dashboard Mahasiswa
            </h1>
        </header>
        <div class="content">
            <aside>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="index.php">Daftar Mahasiswa</a></li>
                    <li><a href="#">Ubah Data</a></li>
                </ul>
            </aside>
            <div class="form">
                <div>
                    <div>
                        <h4>Edit Data Mahasiswa</h4>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $upd["id"]; ?>">
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" id="nama" required value="<?= $upd["nama"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>:</td>
                                    <td><input type="number" name="jumlah" id="jumlah" required value="<?= $upd["jumlah"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td><input type="date" name="tanggal" id="tanggal" required value="<?= $upd["tanggal"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>tipe</td>
                                    <td>:</td>
                                    <td>
                                        <select name="tipe" value="tipe" id="tipe" required value="<?= $upd["tipe"]; ?>">
                                            <option value="Pengeluaran">Pengeluaran</option>
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Hutang">Hutang</option>
                                            <option value="Piutang">Piutang</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
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
        <footer>
            <i>Copyright &copy; 2021 PABW</i><br>
            <a href="mailto:pabw2021@uii.ac.id">pabw2021@uii.ac.id</a>
        </footer>
    </div>
</body>

</html>