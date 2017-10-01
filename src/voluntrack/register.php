<?php
require "DBManager.php";
use voluntrack\DBManager;
//echo "Registration Logic goes here!";
//session_start();
$dbm = new DBManager;


$dbconn = $dbm::get_connection();

if($dbconn !== null) {
    echo "Starting Registration process....<br>";
}
/*
foreach ($_POST as $key => $value) {
    echo "$key: $value<br>";
}
*/
echo $_POST['email'];
echo "<p>User exists: " . $dbm->user_exists(trim($_POST['email'])) . "</p>";

 ?>
