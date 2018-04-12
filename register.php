<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام</title>
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
                <span id="logo_notes" class="ico-file-text2"></span>
            </div>

            <div class="login-wrapper">
                <form method="post" action="register-check.php">

                    <div class="form-group">
                        <input type="email" class="input-box" name="email" placeholder="ایمیل">
                    </div>

                    <div class="form-group">
                        <input type="password" class="input-box" name="password" placeholder="رمز عبور">
                    </div>

                    <div class="form-group">
                        <input type="text" class="input-box" name="fullname" placeholder="نام کامل">
                        <input type="text" class="input-box" name="nickname" placeholder="نام مستعار">
                    </div>

                    <button type="submit" name="btn_register" class="btn-blue">ثبت نام</button>

                </form>
            </div>

            <div class="box-links">
                <a href="login.php">ورود</a>
            </div>

        </div>
    </div>
</div>
<!-- panel login -->

</body>
</html>