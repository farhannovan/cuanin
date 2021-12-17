<?php
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman ke halaman awal
header("location:index.html");
