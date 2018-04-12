<?php
require_once 'main.php';

if (!isset($_POST['btn_edit_profile'])) {
    header("Location: index.php");
    exit();
} else {

    $user_id = $_SESSION['user_id'];

    // check user is valid
    if ($user_id != $_SESSION['user_id']) {
        header("Location: index.php");
        exit();

    } else {

        // Declared var
        $password = hashData($_POST['password']);
        $fullname = $_POST['fullname'];
        $nickname = $_POST['nickname'];
        $visited_date = getDateTime();

        // make db
        $db = Db::getInstance();

        if ($_POST['password'] !== '') {
            $sql_update1 = $db->modify("UPDATE `x_user` SET `password`='$password',`fullname`='$fullname', `nickname`='$nickname' WHERE `user_id`='$user_id';");
            if ($sql_update1) {
                header("Location: index.php");
                exit();
            }
        } else {

            //
             $result = $db->query("SELECT * FROM `x_user` WHERE `user_id`='$user_id';");
            foreach ($result as $row) {
                $password = $row['password'];
                $userId   = $row['user_id'];
            }
            // update password
            $sql_update = $db->modify("UPDATE `x_user` SET `password`='$password',`fullname`='$fullname',`nickname`='$nickname' WHERE `user_id`='$userId';");
            if ($sql_update) {
                header("Location: index.php");
                exit();
            }

        }

    }

}


