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
    echo "<a href=\"/voluntrack/logout.php\">Logout</a>";
}
else {
    echo "<a href=\"/voluntrack/login_view.php\">Login</a>";
}
?>
</body>
