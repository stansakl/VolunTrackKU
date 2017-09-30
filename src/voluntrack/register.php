<?php
require_once "DBManager.php";
use voluntrack\DBManager;
echo "Registration Logic goes here!";

$dbm = new DBManager;

$dbconn = $dbm->connect_to_database();

if($dbconn !== null) {
    echo "Starting Registration process....";
}
 ?>
