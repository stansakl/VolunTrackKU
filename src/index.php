<!DOCTYPE html>
<head>
    <title>VolunTrack</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/voluntrack.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/voluntrack.js"></script>
</head>
<body>
    <h1 class="btn-info">Welcome to VolunTrack!</h1>
<?php
//namespace voluntrack;
require "user.php";
echo "It works!<br>";

$user = new voluntrack\User();
$user->name = "new user";

echo "Hello $user->name!<br><br>";
echo phpinfo();

?>
</body>
