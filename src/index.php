<?php
/*
The MIT License (MIT)

Copyright (c) 2017 CodeHawk810

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
session_start();
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
	if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
		echo "<a href=\"voluntrack/adminreport_view.php\">Organizational Time Report</a><br>";
	}
	
	echo "<div class=\"container\">";
	echo "<div class=\"panel panel-primary\">";
	echo "<div class=\"panel-heading\">Welcome "; echo $_SESSION['user']; echo"</div>";
	echo "<div class=\"panel-body\">";
	echo "<h4>Please choose an option</h4>";
	echo "<div class=\"btn-group-vertical\">";
    echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/timeentry_view.php\"><span class=\"glyphicon glyphicon-time\"></span> Enter Time</a>";
    echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/timereport_view.php\"><span class=\"glyphicon glyphicon-list\"></span> My Time Report</a>";
    echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a>";
    echo "</div>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}
else {
	echo "<div class=\"container\">";
	echo "<div class=\"panel panel-primary\">";
	echo "<div class=\"panel-heading\">Welcome</div>";
	echo "<div class=\"panel-body\">";
	echo "<h4>Login</h4>";
	echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/login_view.php\" role=\"button\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a>";
	echo "<h4>New user? Register Now!</h4>";
	echo "<a class=\"btn btn-primary btn-lg\" href=\"voluntrack/register_view.php\" role=\"button\"><span class=\"glyphicon glyphicon-user\"></span> Register</a>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
}

?>


</body>