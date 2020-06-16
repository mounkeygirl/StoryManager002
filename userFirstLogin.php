<?php
session_start();
include_once("php/basic.php");
loadHeader("Home Page");
?>

<!-- set session varriables -->
<?php
$_SESSION["username"]=htmlspecialchars($_POST["username"]);
$_SESSION["password"]=htmlspecialchars($_POST["password"]);
 ?>

Log in procress (User First Login)
Welcome back <?php echo $_POST["username"]?>
