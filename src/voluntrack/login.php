<?php
session_start();
require "DBManager.php";
require "user.php";
use voluntrack\DBManager;
use voluntrack\User;

$dbm = DBManager::get_instance();

$canLogin = $dbm->attempt_login($_POST['username'], $_POST['password']);
$user = new voluntrack\User("", "", "");
if ($canLogin == 1) {
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $_POST['username'];
    header("location:../index.php");
}
else {
    //redirect back to login page
    header("location: login_view.php");
}
