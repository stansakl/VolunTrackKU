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
    <main class="container">
        <h1 class="btn-info">Welcome to VolunTrack!</h1>
    </main>

<?php
require "./voluntrack/user.php";
use voluntrack\User;

//echo phpinfo();
//var_dump($_SESSION);
if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"/voluntrack/logout.php\">Logout</a>";
}
else {
    echo "<a href=\"/voluntrack/login_view.php\">Login</a>";
}
?>
</body>
