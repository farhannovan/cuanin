<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sign In — Cuanin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <meta name="theme-color" content="#fff" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png" />
    <link rel="stylesheet" media="all" href="css/style.css" />
</head>

<body>
    <div class="login">
        <div class="login-row">
            <div class="login-col">
                <a class="login-logo" href="index.html"><img src="assets/logo-white.png" alt="Cuanin" /></a>
                <h1 class="login-title h1">Make your <br />business more <br />powerfull</h1>
                <div class="login-preview">
                    <img src="assets/bg2.png" alt="gambar-2">
                </div>
            </div>

            <!-- Form -->
            <div class="login-col">
                <a class="login-logo"><img src="assets/logo-sm.svg" alt="" /></a>
                <form action="login.php" method="post">
                    <div class="login-form">
                        <div class="login-stage h4">Sign in to Cuanin</div>
                        <div class="login-field">
                            <div class="field-label">Username</div>
                            <div class="field-wrap">
                                <input class="field-input" type="text" name="user" />
                            </div>
                        </div>
                        <div class="login-field">
                            <div class="field-label">Password</div>
                            <div class="field-wrap">
                                <input class="field-input" type="password" name="pass" />
                            </div>
                        </div>
                        <!-- <div class="login-links text-right">
                            <a class="login-link" href="#">Forgot Password?</a>
                        </div> -->
                        <!-- <a class="btn btn-primary btn-wide" type="submit" name="submit" href="dashboard.html">Sign
                            in</a> -->
                        <button class="btn btn-primary btn-wide" type="submit" name="submit">Sign In</button>
                        <div class="login-flex">
                            <div class="login-text">Not a member?</div>
                            <!-- <a class="login-link" href="signup.php">Click here to sign up</a> -->
                            <a class="login-link" type="submit" name="signup" id="" onclick="goTo2()">Click here to
                                signup</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function goTo2() {
            location.replace("signup.php");
        }

        function back() {
            location.replace("index.html");
        }
    </script>
</body>

</html>