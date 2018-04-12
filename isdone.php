<?php
require_once 'main.php';

if (isset($_SESSION['user_id'])) {

    $note_id = intval($_GET['id']);
    $user_id = intval($_SESSION['user_id']);

    $db = Db::getInstance();
    $result = $db->modify("UPDATE `x_note` SET `isDone`=NOT isDone WHERE `note_id`='$note_id' AND `user_id`='$user_id';");

    if ($result) {
        header("Location: index.php");
        exit();
    }

} else {
    header("Location: index.php");
    exit();
}

