<?php
$conn = mysqli_connect('localhost', 'root', '') or
    die('Unable to connect. Check your connection parameters.');
mysqli_select_db($conn, 'cuanin') or die(mysqli_error($conn));


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function input($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    $query = "INSERT INTO transaksi VALUES ('', '$nama', '$tanggal', '$tipe', '$jumlah')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM transaksi WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function edit($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    $query = "UPDATE transaksi SET 
                nama = '$nama',
                tanggal = '$tanggal',
                tipe = '$tipe',
                jumlah = '$jumlah',
            WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function rupiah($angka)
{
    $rupiah = "Rp" . number_format($angka, 0, ".", ".");
    return $rupiah;
}
