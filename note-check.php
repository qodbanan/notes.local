<?php
require_once 'main.php';

if (isset($_POST['btn_register_note'])) {

    // Declared var
    $title   = $_POST['title'];
    $text    = $_POST['text'];
    $user_id = $_SESSION['user_id'];
    $date    = getDateTime();

    // check is empty
    if (!empty($title) && !empty($text)) {

        $db = Db::getInstance();
        $result = $db->insert("INSERT INTO `x_note` (`note_id`,`user_id`,`title`,`text`,`created_at`,`isDone`) VALUES (NULL ,'$user_id','$title','$text','$date','0');");
        if ($result) {
            header("Location: index.php");
            exit();
        } else {
            $msg = 'خطا در ثبت یاداشت لطفا دوباره تلاش کنید' . " <a href='index.php'>برو به پنل</a>";
            require_once 'msg-fail.php';
            exit();
        }

    } else {
        $msg = 'عنوان و یاداشت نمیتواند خالی باشد.' . " <a href='index.php'>برو به پنل</a>";
        require_once 'msg-fail.php';
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}
