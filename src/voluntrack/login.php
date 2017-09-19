<?php
namespace voluntrack;
session_start();

echo "Logged in!<br><br>";
//$logged_in = true;

foreach ($_POST as $key => $value) {
    echo "$key: $value<br>";
}

$_SESSION['logged_in'] = true;
header("location:../index.php");
