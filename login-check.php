<?php
require_once 'main.php';

// Check is set
if (isset($_POST['btn_login'])) {

    // connection db
    $db = Db::getInstance();

    // Declared variables
    $email      = $_POST['email'];
    $password   = hashData($_POST['password']);

    if (!empty($email) && !empty($password)) {

        // Fetch user
        $result = $db->first("SELECT * FROM `x_user` WHERE `email`='$email';");

        // Check login
        if ($result == null) {
            $msg = "لطفا ایمیل و رمز عبور خود را چک کنید" . " <a href='login.php'>ورود</a> ";
            require_once 'msg-fail.php';
            exit;
        } else {
            // check password login
            if ($password == $result['password']) {

                // set session user
                $_SESSION['set_login'] = true;
                $_SESSION['user_id']   = $result['user_id'];
                $_SESSION['email']     = $result['email'];

                //header("Location: account/");
                //exit();
				$msg = "با موفقیت وارد شدید به" . " <a href='index.php'>پنل</a> وارد شوید";
                require_once 'msg-success.php';
                exit;

            } else {
                $msg = "لطفا ایمیل و رمز عبور خود را چک کنید" . " <a href='login.php'>ورود</a> ";
                require_once 'msg-fail.php';
                exit;
            }
        }

    } else {
        $msg = "ایمیل و رمز عبور خالی می باشد" . " <a href='login.php'>ورود</a> ";
        require_once 'msg-fail.php';
        exit;
    }

} else {
    header("Location: login.php");
    exit();
}