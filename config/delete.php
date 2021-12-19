<?php
require 'function.php';

$id = $_GET["id"];

if (delete($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href = '../transaction.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = '../transaction.php';
        </script>
    ";
}
