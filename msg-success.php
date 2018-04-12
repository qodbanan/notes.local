<?php
/*if (isset($_SESSION['set_login'])) {
    header("Location: login.php");
    exit;
}*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پیام موفقیت</title>
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
                <span id="logo_notes" class="ic-signup"></span>
            </div>

            <div class="wrapper">
                <p class="text-center text-success">
                    <?php echo $msg; ?>
                </p>
            </div>

        </div>
    </div>
</div>
<!-- panel login -->

</body>
</html>