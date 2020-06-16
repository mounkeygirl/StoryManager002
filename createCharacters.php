<?php

include("php/basic.php");
loadHeader("Add New Character");

//add character submit code
if(isset($_POST['fName'])&&(isset($_POST['lName']))) {
  include_once("php/login.php");
  $lName=htmlspecialchars($_POST['lName']);
  $fName=htmlspecialchars($_POST['fName']);

  //for now all story id's will be 1, but that is liable to change in the future
  $storyId=1;

  $query="INSERT INTO Characters(firstName,lastName,storyId) VALUES('$fName','$lName','$storyId')";
  $result=$conn->query($query);
  if(!$result){
    die("Database access failed.");
  } else {
    echo "<p class='update'>$fName $lName has been added to the database</p>";

  }

  $conn->close();
}


 ?>


  <div id="outputBox">

    <form action="createCharacters.php" method="post"><pre>
  First Name  <input type="text" name="fName">
  Last Name   <input type="text" name="lName">
              <input type="submit" value="Add Character">

    </pre></form>
  </div>
  </body>
</html>
