
<?php


//I will be creating multiple relationship select lists, with minor tweaks to the query
function createRelationshipTypeSelectListFromSql($sqlQuery,$selectName){
  echo '<select name="relationshipType">
    <option value="">-</option>';


  //use the database to populate drop down list
  require("php/login.php");
  //search database
  //character id already established earlier in script
  $sql = $sqlQuery;
  $result = $conn->query($sql);

  if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
      $name=$row["name"];
      $eachId=$row["id"];
      echo "<option value=$eachId>$name</option>";
    }
  }

  //close results and database
  $result->close();
  $conn->close();

  echo '</select>';


}

//create an array of other characters, so that I don't have to
//keep refering to the database
  $peoplePresent=array();

include("php/basic.php");


loadHeader("Add Relationships");
echo'<div id="outputBox">';

//get relevent character info
//login to database
require("php/login.php");
//search database
$charaId=$_COOKIE['id'];
$sql = "SELECT * FROM Characters WHERE id='$charaId'";
$result = $conn->query($sql);

if($result->num_rows>0){
  while($row = $result->fetch_assoc()){
    $fname=$row["firstName"];
    $lname=$row["lastName"];
    //main character will refer to the primary character
    $mainCharacter=new MyCharacter($fname,$lname,$charaId);
    $peoplePresent[$charaId]=$mainCharacter;
  }
}

//close results and database
$result->close();
$conn->close();
 ?>

<h2>Currently Selected Character:</h2>
<h3><?php echo $fname." ".$lname  ?></h3>

<!-- Place form inside a table for easy formating -->
<form>
  <table>
    <tr>
      <th>What kind of relationship is this?</th>
      <td>

        <!--
        <div id="relationshipDivs">
          <div id="relationshipBaseDiv">
            <?php
            /*
            $sql = "SELECT * FROM relationship_types WHERE parentId IS NULL";
             createRelationshipTypeSelectListFromSql($sql,"relationshipBase");
             */
             ?>
          </div>
          <div id="familyRelationshipsDiv">
            <?
            /*
             $sql = "SELECT * FROM relationship_types WHERE parentId=1";
             createRelationshipTypeSelectListFromSql($sql,"familyRelationships")
             */
              ?>

          </div>
        </div>
         -->

      </td>
    </tr>
    <tr>
      <th>Who is this relationship with?</th>
      <td>

        <select id="secondCharacterSelect" name="secondCharacterSelect" onclick="displayRelationship()">
          <option value="">-</option>
<?php


//use the database to populate drop down list
require("php/login.php");
//search database
//character id already established earlier in script
$sql = "SELECT * FROM Characters WHERE NOT id='$charaId'";
$result = $conn->query($sql);

if($result->num_rows>0){
  while($row = $result->fetch_assoc()){
    $fname=$row["firstName"];
    $lname=$row["lastName"];
    $eachId=$row["id"];
    //echo out an option with the id as the value
    echo "<option value=$eachId>$fname $lname</option>";
    //add a new character the the $peoplePresent array, using their id as the reference
    $peoplePresent[$eachId]=new MyCharacter($fname,$lname,$id);

  }
}

//close results and database
$result->close();
$conn->close();


 ?>


        </select>
      </td>
    </tr>
    <tr>

      <!-- Display potental relationship -->
      <td colspan="2"><?php
      $fName=$peoplePresent[$charaId]->getFirstName();
      $lName=$peoplePresent[$charaId]->getLastName();

      echo "$fName $lName"
      ?> is the *Relationship* of <span id='relationshipPreview'></span>

    </td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="" value="Submit"></td>
    </tr>
  </table>
</form>

<script type="text/javascript">
function displayRelationship(){
   var e=document.getElementById("secondCharacterSelect");
   //
   var selectedE=e.options[e.selectedIndex].text;
  document.getElementById("relationshipPreview").innerHTML=selectedE;

}
</script>

<!-- End output box div -->
</div>



</body>
</html>
