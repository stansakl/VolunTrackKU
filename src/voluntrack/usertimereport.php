<?php
require "DBManager.php";
use voluntrack\DBManager;

session_start();
$dbm = DBManager::get_instance();

echo "Called usertimereport.php";