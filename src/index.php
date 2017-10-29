<?php session_start();
require "./voluntrack/htmlconstants.php";
?>
<!DOCTYPE html>
<?php echo HEADER; ?>

<body>
    <main class="container">
        <h1 class="btn-info">VolunTrack!</h1>
    </main>

<?php
require "./voluntrack/user.php";
use voluntrack\User;

//echo phpinfo();
//var_dump($_SESSION);
if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"voluntrack/logout.php\">Logout</a><br>";
}
else {
    echo "<a href=\"voluntrack/login_view.php\">Login</a><br>";
    echo "<a href=\"voluntrack/register_view.php\">Register</a>";
}

if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"voluntrack/timeentry_view.php\">Enter Time</a><br>";
}

if(isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true)) {
    echo "<a href=\"voluntrack/timereport_view.php\">Time Report</a><br>";
}
?>


</body>
