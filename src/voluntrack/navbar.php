<?php

?>

<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand logoname" href="..">Voluntrack</a>
    </div>
<?php
if((isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true))) {
  if (basename($_SERVER['PHP_SELF'])=='index.php'){
  echo "<ul class=\"nav navbar-nav custnav\">";
  echo "<li><a href=\"voluntrack/timeentry_view.php\"><span class=\"glyphicon glyphicon-time\"></span> Enter Time</a></li>";
  echo "<li><a href=\"voluntrack/timereport_view.php\"><span class=\"glyphicon glyphicon-list\"></span> My Report</a></li>";
  echo "</ul>";
  echo "<ul class=\"nav navbar-nav navbar-right custnav\">";
  echo "<li class='userinfocust'>Logged in as : <span class=\"glyphicon glyphicon-user\"></span> "; echo $_SESSION['user']; echo "</li>";
  echo "<li><a href=\"voluntrack/logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";  
  } else{
  echo "<ul class=\"nav navbar-nav custnav\">";
  echo "<li><a href=\"timeentry_view.php\"><span class=\"glyphicon glyphicon-time\"></span> Enter Time</a></li>";
  echo "<li><a href=\"timereport_view.php\"><span class=\"glyphicon glyphicon-list\"></span> My Report</a></li>";
  echo "</ul>";
  echo "<ul class=\"nav navbar-nav navbar-right custnav\">";
  echo "<li class='userinfocust'>Logged in as : <span class=\"glyphicon glyphicon-user\"></span> "; echo $_SESSION['user']; echo "</li>";
  echo "<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";
  }
}
?>  

    </ul>
  </div>
</nav>

<?php ?>
