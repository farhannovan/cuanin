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

function registrasi($data)
{
    global $conn;

    $fullname = mysqli_real_escape_string($conn, $data['fullname']);
    // $username = mysqli_real_escape_string($conn, $data['username']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $no_hp = mysqli_real_escape_string($conn, $data['no_hp']);

    $username = strtolower(stripslashes($data["username"]));
    $pass = mysqli_real_escape_string($conn, $data["pass"]);
    $repass = mysqli_real_escape_string($conn, $data["repass"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('Username sudah terdaftar!')
		      </script>";
        return false;
    }


    // cek konfirmasi password
    if ($pass !== $repass) {
        echo "<script>
				alert('Konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }

    // enkripsi password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    // mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$pass')");
    mysqli_query($conn, "INSERT INTO user (fullname,username,no_hp,email,password) VALUES ('$fullname','$username','$no_hp','$email','$pass')");

    return mysqli_affected_rows($conn);
}
