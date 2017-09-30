<?php
require_once "DBManager.php";
use voluntrack\DBManager;
//echo "Registration Logic goes here!";

$dbm = new DBManager;

$dbconn = $dbm::get_connection();

if($dbconn !== null) {
    echo "Starting Registration process....";
}

foreach ($_POST as $key => $value) {
    echo "$key: $value<br>";
}
echo $_POST['email'];
echo $dbm->user_exists($_POST['email']);
 ?>
