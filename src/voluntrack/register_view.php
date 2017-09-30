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
         <form class="col-md-12" action="register.php" method="post">
             <input type="text" name="firstname" value="" placeholder="First Name"><br>
             <input type="text" name="lastname" value="" placeholder="Last Name"><br>
             <input type="email" name="email" value="" placeholder="Email"><br>
             <input type="password" name="password" value="" placeholder="Password"><br>
              <input type="password" name="confirmpwd" value="" placeholder="Confirm Password"><br>
             <input type="submit" name="registerbtn" value="Register">
         </form>
     </main>

 </body>
