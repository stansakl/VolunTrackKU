<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/css/voluntrack.css">
<script src="/js/voluntrack.js"></script>
</head>
<?php
//namespace voluntrack;
require "user.php";
echo "It works!<br>";

$user = new voluntrack\User();
$user->name = "new user";

echo "Hello $user->name!<br><br>";
echo phpinfo();

?>
