<?php
require 'function.php';

if (isset($_POST["submit"])) {
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
    <title>Input — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="stylesheet" href="css/input.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>
                Cuanin
            </h1>
        </header>
        <div class="content">
            <aside>
                <ul>
                    <li><a href="#">Input</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sales.php">Sales</a></li>
                    <li><a href="#">Setting</a></li>
                </ul>
            </aside>
            <div class="form">
                <div>
                    <div>
                        <h4>Add Transaction</h4>
                        <form action="" method="post">
                            <table>
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
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <i>Copyright &copy; 2021 Infinite</i><br>
        </footer>
    </div>
</body>

</html>