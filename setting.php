<?php
include 'config/connection.php';
session_start();

$id = $_SESSION['id'];
$query = mysqli_query($db, "SELECT * FROM user where id='$id'") or die(mysqli_error($db));
$row = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $query = "UPDATE user SET fullname = '$fullname', username = '$username', email = '$email', no_hp = $no_hp, password = '$password' WHERE id = '$id'";
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    echo "
        <script type='text/javascript'>;
            alert('Update berhasil😀');
            window.location = 'setting.php';
        </script>
    ";
}

if (empty($_SESSION['id'])) {
    echo '<script language="javascript">';
    echo 'alert("Maaf, anda belum login")';
    header("Refresh:0; url=signin.php");
    echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Setting — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="assets/css/transaction.css" />
    <link rel="stylesheet" media="all" href="assets/css/input.css" />
</head>

<body>
    <!-- Sidebar -->
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-head">
                <img src="assets/img/logo-black.png" class="sidebar-logo" alt="Cuanin" />
            </div>
            <div class="sidebar-body">
                <nav class="sidebar-nav">
                    <a class="sidebar-item" href="dashboard.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/img/sprite.svg#icon-home"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Home</div>
                    </a>
                    <a class="sidebar-item" href="transaction.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-transaction">
                                <use xlink:href="assets/img/sprite.svg#icon-activity"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Transaction</div>
                    </a>
                    <a class="sidebar-item active" href="setting.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/img/sprite.svg#icon-settings"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Setting</div>
                    </a>
                    <a class="sidebar-item" href="signout.php" onclick="return confirm('Apakah kamu yakin untuk keluar?');">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g>
                                    <path d="M0,0h24v24H0V0z" fill="none" />
                                </g>
                                <g>
                                    <path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z" />
                                </g>
                            </svg>
                        </div>
                        <div class="sidebar-text">Sign Out</div>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Header -->
        <div class="page-content">
            <header>
                <a class="header-logo" href=""><img src="assets/img/logo-sm.svg" alt="" /></a>
                <a class="header-user" href="setting.php"><img src="assets/img/ava-header.png" alt="" /></a>
            </header>

            <!-- Content -->
            <div class="transaction">
                <div class="transaction-container">
                    <div class="transaction-stage h5 mobile-show"><strong>User Profile</strong></div>
                    <form action="#" method="post">
                        <div class="input-fieldset">
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Full Name</div>
                                    <div class="input-wrap"><input type="text" name="fullname" id="fullname" required value="<?php echo $row['fullname']; ?>"></div>
                                </div>
                                <div class=" input-field">
                                    <div class="input-label">User Name</div>
                                    <div class="input-wrap"><input type="text" name="username" id="username" required value="<?php echo $row['username']; ?>"></div>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Email</div>
                                    <div class="input-wrap"><input type="email" name="email" id="email" required value="<?php echo $row['email']; ?>"></div>
                                </div>
                                <div class=" input-field">
                                    <div class="input-label">No. Hp</div>
                                    <div class="input-wrap"><input type="text" name="no_hp" id="no_hp" required value="<?php echo $row['no_hp']; ?>"></div>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Password</div>
                                    <div class="input-wrap"><input type="password" name="password" id="password" required value="<?php echo $row['password']; ?>"></div>
                                </div>
                            </div>
                            <div class="btn-right">
                                <button class="btn btn-primary" type="submit" name="update" value="">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>