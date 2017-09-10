<?php
session_start();
require "htmlconstants.php";
//namespace voluntrack;
//require '../vendor/autoload.php';
?>
 <?php
 ?>
 <!DOCTYPE html>
 <?php echo HEADER; ?>


 <body>
     <main class="container">
         <form class="col-md-12" action="login.php" method="post">
             <input type="text" name="username" value="" placeholder="User name or email"><br>
             <input type="password" name="password" value="" placeholder="Password"><br>
             <input type="submit" name="loginbtn" value="Login">
         </form>
     </main>

 </body>
