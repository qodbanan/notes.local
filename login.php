<?php
require_once 'main.php';
if (isset($_SESSION['email'])) {
    $msg = "شما هم اکنون وارد سایت شدید لطفا به <a href='index.php'>پنل</a> وارد شوید";
    require_once 'msg-success.php';
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود به پنل مدریت</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- panel login -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Box login -->
            <div class="logo">
                <img src="img/notes-icon.png" class="logo-notes">
            </div>

            <div class="login-wrapper">
                <form method="post" action="login-check.php">

                    <div class="form-group">
                        <input type="text" class="input-box" name="email" placeholder="ایمیل">
                    </div>

                    <div class="form-group">
                        <input type="password" class="input-box" name="password" placeholder="رمز عبور">
                    </div>

                    <button type="submit" name="btn_login" class="btn-blue">ورود</button>

                </form>
            </div>

            <div class="box-links">
                <a href="register.php">ساخت حساب جدید</a>
            </div>

        </div>
    </div>
</div>
<!-- panel login -->

</body>
</html>