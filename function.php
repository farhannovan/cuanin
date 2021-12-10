<?php
$conn = mysqli_connect("localhost", "root", "", "cuanin");

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

function insert($data)
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
