<?php
require_once 'main.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت یاداشت جدید</title>
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
                <span id="logo_notes" class="ico-pencil"></span>
            </div>

            <div class="login-wrapper">
                <form method="post" action="note-check.php">

                    <div class="form-group">
                        <input type="text" class="input-box" name="title" placeholder="عنوان نوت">
                    </div>

                    <div class="form-group">
                        <textarea name="text" class="input-box" placeholder="یاداشت"></textarea>
                    </div>

                    <button type="submit" name="btn_register_note" class="btn-blue">ثبت یاداشت</button>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- panel login -->

</body>
</html>