<?php
require "DBManager.php";
use voluntrack\DBManager;
//echo "Registration Logic goes here!";
//session_start();
$dbm = DBManager::get_instance();
/*
if ($_POST['password'] !== $_POST['confirmpwd']) {
    echo "Passwords do not match!";
    header("location: register.php");
}
*/
try {
    $dbm->register_user($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['email'],$_POST['password']);
    header("location: login.php");

} catch (\Exception $e) {
    echo "Cannot register user: " . $e->getMessage();
    header("location: register.php");
}
