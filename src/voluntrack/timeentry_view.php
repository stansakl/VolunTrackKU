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
         <form class="col-md-12" action="timeentry.php" method="post">
             <input type="submit" name="loginbtn" value="Enter My Time">
         </form>
     </main>

 </body>
