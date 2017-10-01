<?php
require "DBManager.php";
use voluntrack\DBManager;
//echo "Registration Logic goes here!";
//session_start();
$dbm = DBManager::get_instance();

try {
    $dbm->register_user($_POST['firstname'],$_POST['lastname'],$_POST['middlename'],$_POST['email'],$_POST['password']);

} catch (\Exception $e) {
    echo "Cannot register user: " . $e->getMessage();
}



 ?>
