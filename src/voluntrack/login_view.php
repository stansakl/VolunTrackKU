<?php
namespace voluntrack;
//require '../vendor/autoload.php';
?>
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
         <form class="col-md-12" action="login.php" method="post">
             <input type="text" name="username" value="" placeholder="User name or email"><br>
             <input type="password" name="password" value="" placeholder="Password"><br>
             <input type="submit" name="loginbtn" value="Login">
         </form>
     </main>

 </body>
