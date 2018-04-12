<?php
require_once '../main.php';
if (!isset($_SESSION['set_login'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account user</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="container-box">
            <div class="col-12">
                <div class="row">

                    <!-- Section right -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="profile">
                            <img src="img/avatar.png">
                            <p class="detail-profile">خوش امدید:  <strong><?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; ?></strong></p>
                        </div>
                    </div>

                    <!-- Section right -->

                    <!-- Section left -->
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="group-content">
                            <a href="logout.php" class="btn-exit">خروج</a>
                        </div>
                    </div>
                    <!-- Section left -->

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


