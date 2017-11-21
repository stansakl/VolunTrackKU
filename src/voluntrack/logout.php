<?php
session_start();

$_SESSION['logged_in'] = false;
unset($_SESSION['error']);
unset($_SESSION['logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['user']);
session_destroy();

header("location:../index.php");
