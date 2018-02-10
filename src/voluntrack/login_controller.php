<?php
session_start();
require "DBManager.php";
require "user.php";
use voluntrack\DBManager;
use voluntrack\User;

$dbm = DBManager::get_instance();

$canLogin = $dbm->attempt_login($_POST['username'], $_POST['password']);
$user = new voluntrack\User("", "", "", "");
if ($canLogin !== false && $canLogin > 0) {
    unset($_SESSION['error']);
    //unset($canLogin);
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['user_id'] = $canLogin;
    header("location:../index.php");
}
else {
    //redirect back to login page
    $_SESSION['error'] = "Bad username or password!";
    $_SESSION['logged_in'] = false;
    $_SESSION['user'] = '';
    unset($canLogin);

    header("location: login_view.php");
}


