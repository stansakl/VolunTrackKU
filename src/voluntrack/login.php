<?php
session_start();
require "DBManager.php";
use voluntrack\DBManager;

$dbm = DBManager::get_instance();

$canLogin = $dbm->attempt_login($_POST['username'], $_POST['password']);

if ($canLogin == 1) {
    $_SESSION['logged_in'] = true;
    header("location:../index.php");
}
else {
    //redirect back to login password_get_info
    header("location: login_view.php");
}
