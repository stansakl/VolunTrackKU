<?php
require "DBManager.php";
use voluntrack\DBManager;

session_start();
$dbm = DBManager::get_instance();

if ($_POST['password'] !== $_POST['confirmpwd']) {
    $_SESSION['error'] = "Passwords do not match!";
    header("location: register.php");
}

try {
    unset($_SESSION['error']);
    $dbm->register_user($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['email'],$_POST['password']);
    header("location: register.php");

} catch (\Exception $e) {
    
    $_SESSION['error'] = "An error occurred registering the user. Please try again.";
    header("location: register.php");
}
