<?php
require 'function.php';
/* ------------- SESSION ------------ */
session_start();
// if (empty($_SESSION['username']) || empty($_SESSION['password'])) {
//     echo '<script language="javascript">';
//     echo 'alert("belum login bro ?")';
//     header("Refresh:0; url=signin.php");
//     echo '</script>';
// }

/* ---------- UPDATE PROFIL --------- */
if (isset($_POST['update'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username) or empty($fullname)) {
        echo '<script language="javascript">';
        echo 'alert("data tidak boleh kosong")';
        echo '</script>';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script language="javascript">';
            echo 'alert("email tidak valid")';
            echo '</script>';
        } else {
            if (empty($password)) {
                $id = $_SESSION['id'];
                $query = "UPDATE user SET username='$username', fullname='$fullname', email='$email', no_hp='$no_hp' WHERE id='$id'";
                if (mysqli_query($conn, $query)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['fullname'] = $fullname;
                    $_SESSION['email'] = $email;
                    $_SESSION['no_hp'] = $no_hp;

                    echo '<script language="javascript">';
                    echo 'alert("data berhasil diubah")';
                    echo '</script>';
                    echo '<script>window.location.href = "setting.php";</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("data gagal diubah")';
                    echo '</script>';
                }
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $id = $_SESSION['id'];
                $query2 = "UPDATE user SET username='$username', fullname='$fullname', email='$email', no_hp='$no_hp', password='$hash' WHERE id='$id'";
                if (mysqli_query($conn, $query2)) {
                    session_unset();
                    session_destroy();

                    echo '<script language="javascript">';
                    echo 'alert("password berhasil diubah")';
                    echo '</script>';
                    echo '<script>window.location.href = "signin.php";</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("data gagal diubah")';
                    echo '</script>';
                }
            }
        }
    }
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
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="css/sales.css" />
    <link rel="stylesheet" media="all" href="css/input.css" />
</head>

<body>
    <!-- Sidebar -->
    <div class="page">
        <div class="sidebar">
            <div class="sidebar-head">
                <a class="sidebar-logo" href="index.html"><img src="assets/logo-black.png" alt="Cuanin" /></a>
            </div>
            <div class="sidebar-body">
                <nav class="sidebar-nav">
                    <a class="sidebar-item" href="dashboard.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/sprite.svg#icon-home"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Home</div>
                    </a>
                    <a class="sidebar-item" href="sales.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-sale">
                                <use xlink:href="assets/sprite.svg#icon-activity"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Sales</div>
                    </a>
                    <a class="sidebar-item active" href="setting.php">
                        <div class="sidebar-icon">
                            <svg class="icon icon-home">
                                <use xlink:href="assets/sprite.svg#icon-settings"></use>
                            </svg>
                        </div>
                        <div class="sidebar-text">Settings</div>
                    </a>
                    <a class="sidebar-item" href="signout.php">
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
                <a class="header-logo" href="index.html"><img src="assets/logo-sm.svg" alt="" /></a>
                <a class="header-user" href="sign-in.html"><img src="assets/ava-header.png" alt="" /></a>
            </header>

            <!-- Content -->
            <div class="sale">
                <div class="sale-container">
                    <div class="sale-stage h5 mobile-show"><strong>Edit Profile</strong></div>
                    <form action="" method="post">
                        <div class="input-fieldset">
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Full Name</div>
                                    <div class="input-wrap"><input type="text" name="fullname" id="fullname" required value="<?php echo $_SESSION["fullname"] ?>"></div>
                                </div>
                                <div class=" input-field">
                                    <div class="input-label">Username</div>
                                    <div class="input-wrap"><input type="text" name="username" id="username" required value="<?php echo $_SESSION["username"] ?>"></div>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Email</div>
                                    <div class="input-wrap"><input type="email" name="email" id="email" required value="<?php echo $_SESSION["email"] ?>"></div>
                                </div>
                                <div class=" input-field">
                                    <div class="input-label">No. Hp</div>
                                    <div class="input-wrap"><input type="text" name="no_hp" id="no_hp" required value="<?php echo $_SESSION["no_hp"] ?>"></div>
                                </div>
                            </div>
                            <div class="input-row">
                                <div class="input-field">
                                    <div class="input-label">Password</div>
                                    <div class="input-wrap"><input type="password" name="pass" id="password" required value="<?php echo $_SESSION["password"] ?>"></div>
                                </div>
                                <div class="input-field">
                                    <div class="input-label">Password</div>
                                    <div class="input-wrap"><input type="password" name="repass" id="password" required value="<?php echo $_SESSION["password"] ?>"></div>
                                </div>
                            </div>
                            <div class="btn-right">
                                <button class="btn btn-primary" type="submit" name="update" value="update">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>