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
?>

<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand logoname" href="..">Voluntrack</a>
    </div>
<?php
if((isset($_SESSION['logged_in']) && ($_SESSION['logged_in'] == true))) {
  if (basename($_SERVER['PHP_SELF']) == 'index.php'){
  echo "<ul class=\"nav navbar-nav custnav\">";
  echo "<li><a href=\"voluntrack/timeentry_view.php\"><span class=\"glyphicon glyphicon-time\"></span> Enter Time</a></li>";
  echo "<li><a href=\"voluntrack/timereport_view.php\"><span class=\"glyphicon glyphicon-list\"></span> My Report</a></li>";
  echo "</ul>";
  echo "<ul class=\"nav navbar-nav navbar-right custnav\">";
  echo "<li class='userinfocus'>Logged in as : <span class=\"glyphicon glyphicon-user\"></span> "; echo $_SESSION['user']; echo "</li>";
  echo "<li><a href=\"voluntrack/logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";  
  } else{
  echo "<ul class=\"nav navbar-nav custnav\">";
  echo "<li><a href=\"timeentry_view.php\"><span class=\"glyphicon glyphicon-time\"></span> Enter Time</a></li>";
  echo "<li><a href=\"timereport_view.php\"><span class=\"glyphicon glyphicon-list\"></span> My Report</a></li>";
  echo "</ul>";
  echo "<ul class=\"nav navbar-nav navbar-right custnav\">";
  echo "<li class='userinfocus'>Logged in as : <span class=\"glyphicon glyphicon-user\"></span> "; echo $_SESSION['user']; echo "</li>";
  echo "<li><a href=\"logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> Log out</a></li>";
  }
}
?>  

    </ul>
  </div>
</nav>

<?php ?>
