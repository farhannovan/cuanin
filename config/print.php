<?php
include "function.php";
$select = mysqli_query($conn, 'SELECT * FROM transaksi where id = ' . $_GET['id']);
$data = mysqli_fetch_array($select);

session_start();
if (empty($_SESSION['username'])) {
    echo '<script language="javascript">
    ';
    echo 'alert("Maaf, anda belum login")';
    header("Refresh:0; url=signin.php");
    echo '
</script>';
}

$username = $_SESSION['username'];
$que = mysqli_query($conn, "SELECT * FROM user where username='$username'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($que);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Print — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" href="../assets/css/print.css">
</head>

<body>
    <div class="invoice-box rtl">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="../assets/img/logo-black600.png" alt="Company logo" style="width: 100%; max-width: 300px" />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong> Invoice#<?php echo $data['id']; ?></strong><br />Tanggal: <?php echo date('d-m-Y', strtotime($data['tanggal'])); ?>
                            </td>
                            <td>
                                <?php echo $row['fullname']; ?><br /><?php echo $row['email']; ?><br /><?php echo $row['no_hp']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Tipe Transaksi</td>
                <td></td>
            </tr>

            <tr class="details">
                <td><?php echo $data['tipe']; ?></td>
                <!-- <td>1000</td> -->
            </tr>

            <tr class="heading">
                <?php $total_rupiah = $data['jumlah'];
                $rupiah = rupiah($total_rupiah);
                ?>
                <td>Nama Transaksi</td>
                <td>Jumlah</td>
            </tr>

            <tr class="item last">
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $rupiah; ?></td>
            </tr>

            <tr class="total">
                <td><strong>Total</strong> </td>
                <td><?php echo $rupiah; ?></td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    </script>
</body>

</html>