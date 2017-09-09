<?php session_start(); ?>
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
require "./voluntrack/user.php";
use voluntrack\User;
echo "It works!<br>";

$user = new User();
$user->first_name = "new user";

echo "Hello $user->first_name!<br><br>";
//echo phpinfo();
//var_dump($_SESSION);
if(isset($_SESSION['logged_in'])) {
    echo "The user is logged in!";
}
else {
    echo "User is not logged in!";
}
?>
</body>
