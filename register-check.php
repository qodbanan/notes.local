<?php
require_once 'main.php';

if (isset($_POST['btn_register'])) {

    // Declared variables
    $email    = $_POST['email'];
    $password = hashData($_POST['password']);
    $fullname = $_POST['fullname'];
    $nickname = $_POST['nickname'];
    $date     = getDateTime();

    // create db
    $db = Db::getInstance();

    // check is user in database
    $row = $db->first("SELECT * FROM `x_user` WHERE `email`='$email';");
    if ($row != null) {
        $msg = "شما قبلا ثبت نام کردید لطفا وارد شوید <a href='login.php'>ورود</a>";
        require_once 'msg-fail.php';
        exit();
    } else {

        // check is empty
        if (!empty($email) && !empty($password)) {

            // insert user
            $sql = $db->insert("INSERT INTO `x_user` (`email`,`password`,`fullname`,`nickname`,`register_date`,`visited_date`) 
            VALUES ('$email','$password','$fullname','$nickname','$date','$date');");

            // check register success
            if ($sql) {
                $msg=  "ثبت نام با موفقیت انجام شد" . " <a href='login.php'>ورود</a> ";
                require_once 'msg-success.php';
                exit();

            } else {
                // Wrong in register
                $msg=  "در ثبت نام مشکلی پیش امدید دوباره تلاش کنید <a href='login.php'>ورود</a>";
                require_once 'msg-fail.php.php';
                exit();
            }

        } else {

            $msg = "ایمیل و رمز نمی تواند خالی رها شود <a href='register.php'>ثبت نام</a> یا <a href='register.php'>ورود</a>";
            require_once 'msg-fail.php';
            exit();
        }

    }


} else {
    header("Location: register.php");
    exit();
}

