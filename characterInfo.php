<?php
include("php/basic.php");
loadHeader("Character Info");
echo'<div id="outputBox">';
updateIdCookie($_POST["idSelection"]);
$_SESSION['charaId']=$charaId= $_POST["idSelection"];

  //login to sql server
  include_once("php/login.php");
  //run sql query
  $sql = "SELECT * FROM Characters WHERE id=$charaId";
  $result = $conn->query($sql);

  //output
  //if no result. Defult to first character
  if($result->num_rows==0){
    echo "No character of that id found. Defaulting to character id 1";
    $charaId= $_POST["idSelection"]=1;
    $sql = "SELECT * FROM Characters WHERE id=$charaId";
    $result = $conn->query($sql);
  }

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
    $result ->close();
    }

    echo "<h3>Details</h3>";

    //Add Details As well
    $sql = "SELECT * FROM Character_Details WHERE character_id=$charaId";
    $result = $conn->query($sql);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $detail=$row['detail'];

        echo"<tr><td>$detail</td></tr>";
      }

    } else{
      echo "<p>No Character Details At This Time</p>";
    }
?>
<form class="myForm" action="updateCharacterName.php" method="post">
  <h3>Change Name</h3>
  <table>
    <tr>
      <td>First Name</td>
      <td>
        <input type="text" name="fName" value="">
      </td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td>
        <input type="text" name="lName" value="">
      </td>
    </tr>
  </table>
 <button class="submitButton" type="submit" name="updateName">Update Name</button>
</form>

<h2>Relationships</h2>
<h3>Groups</h3>
<?php
    // Next get data on groups

    //run sql query
    $sql = "SELECT group_members.*,groups.name
    FROM group_members
    INNER JOIN groups ON group_members.group_id=groups.id
    WHERE chara_id=$charaId;";



    // -- SELECT * FROM group_members WHERE chara_id=$charaId";
    $result = $conn->query($sql);


    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $name=$row['name'];

        echo"<tr><td>$name</td></tr>";
      }
    }

    $result ->close();

    ?>
    <br>
    <button type="button" name="button">Add Group</button>

    <?php
    $conn->close();


 ?>





 <h2>Show Images</h2>
 <h2>Show Time Line</h2>
 <h2>Show Relevent Stories</h2>
</div>

<?php include_once("tail.php")
 ?>
