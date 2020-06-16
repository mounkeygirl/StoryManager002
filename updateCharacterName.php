<?php
session_start();
include_once("php/basic.php");
loadHeader("Update Character name");
//add character submit code
$charaId = $_SESSION['charaId'];
$fName = htmlspecialchars($_POST['fName']);
$lName= htmlspecialchars($_POST['lName']);
echo "Updateing Character Name to $fName $lName\n";
if($fName!="" or $lName!=""){
  include_once("php/login.php");

  $query="UPDATE characters";

  if(isset($fName) && isset($lName)){
    if ($fName!="" && $lName!=""){
      $query.=" SET firstName=\"$fName\", lastName=\"$lName\"";
    } elseif($fName!=""){
      $query.=" SET firstName=\"$fName\"";
    } elseif ($lName!="") {
      $query.=" SET lastName=\"$lName\"";
    }

  }

  $query.=" WHERE id = $charaId;";

  print("Query: $query");
  $result=$conn->query($query);
  if(!$result){
    die("Database access failed.");
  } else {
    echo "<p class='update'>$fName $lName has been added to the database</p>";

  }

  $conn->close();
} else{
  print("No first name or last name detected");
}


include_once('tail.php')

 ?>
