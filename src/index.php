<?php session_start();
require "./voluntrack/indexconstants.php";
?>
<!DOCTYPE html>
<?php echo HEADER; ?>

<body>
<?php require "./voluntrack/navbar.php"; ?>



<?php
require "./voluntrack/user.php";
use voluntrack\User;

//echo phpinfo();
//var_dump($_SESSION);
if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"voluntrack/logout.php\">Logout</a><br>";
}
else {
	echo "<div class=\"container\">";	
	echo "<div class=\"panel panel-primary\">";
	echo "<div class=\"panel-heading\">Welcome</div>";
	echo "<div class=\"panel-body\">";
	echo "<h4>Login</h4>";
	echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/login_view.php\" role=\"button\">Login</a>";
	echo "<h4>New user? Register Now!</h4>";
	echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/register_view.php\" role=\"button\">Register</a>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}

if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"voluntrack/timeentry_view.php\">Enter Time</a><br>";
}
?>


</body>
