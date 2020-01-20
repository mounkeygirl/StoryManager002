<?php
function generateCharacterInfo(){
  updateIdCookie($_POST["idSelection"]);
  $charaId= $_POST["idSelection"];

  //login to sql server
  include_once("functions/login.php");
  //run sql query
  $sql = "SELECT * FROM Characters WHERE id=$charaId";
  $result = $conn->query($sql);

  //output
  if($result->num_rows>0){
    //set up output table
    echo " <div id=\"characterOutput\"><table>";

    while($row = $result->fetch_assoc()){
      $idNum=$row["id"];
      $fname=$row["firstName"];
      $lname=$row["lastName"];
      echo"
      <tr><td>ID Number</td><td>$idNum</td> </tr>
      <tr><td>First Name</td><td>$fname</td></tr>
      <tr><td>Last Name</td><td>$lname</td></tr>
      ";
    }


    echo "</table></div>";
    }
  }


include("functions/basic.php");
loadHeader("Character Info");
generateCharacterInfo();

 ?>




</body>
</html>
