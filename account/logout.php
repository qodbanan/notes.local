<?php
session_start();
unset($_SESSION['set_login'],$_SESSION['user_id'],$_SESSION['email']);
header("Location: ../login.php");
exit();