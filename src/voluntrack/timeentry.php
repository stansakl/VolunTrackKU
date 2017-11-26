<?php
session_start();
require "DBManager.php";
use voluntrack\DBManager;
//echo "Registration Logic goes here!";
//session_start();
$dbm = DBManager::get_instance();

$start_datetime_string = strtotime($_POST['projectdate'] . " " . $_POST['starttime']);
$end_datetime_string = strtotime($_POST['projectdate'] . " " . $_POST['endtime']);
$projectName = $_POST['project'];
$user = $_SESSION['user'];
$dbm->add_time_for_user($user, $projectName, $start_datetime_string, $end_datetime_string);
header("location:../index.php");