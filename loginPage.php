<?php
include_once("php/basic.php");
loadHeader("Login Page");
 ?>

<div id="outputBox">
 <form class=loginForm class="" action="userFirstLogin.php" method="post">
   <table>
     <tr>
       <td><label for="username">Username:</label></td><td><input type="text" name="username" value=""></td>
     </tr>
     <tr>
       <td><label for="password">Password:</label></td><td><input type="password" name="password" value=""></td>
     </tr>
   </table>
   <button type="submit" name="submit">Login</button>
 </form>
</div>

 <?php include_once("tail.php") ?>
