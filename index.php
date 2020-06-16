<?php
session_start();
include_once("php/basic.php");
loadHeader("Home Page");
?>
<div id="outputBox">
  <p id="demo">Demo</p>
  <p>User: <?php echo $_SESSION["username"] ?></p>
  <?php

  $peoplePresent=array();


  $marty=new MyCharacter("Marty","Jolly",3);
  $peoplePresent[3]=$marty;
  echo $marty->getFirstName();
  $bartha=new MyCharacter("Bartha","Big",7);
  $peoplePresent[7]=$bartha;
  echo $bartha->getFirstName();

   ?>
   <p>People Present</p>
   <?php
    foreach ($peoplePresent as $key => $value) {
      echo $key.", ".$value->getLastName();
      // code...
    }

    ?>

    <!-- Testing Arranging List in a new Order -->
    <h3>List order test</h3>
    <?php
    $relationTypeArray=array();
    include("php/login.php");

        $relationTypeArray=array();
        $sql = "SELECT * FROM relationship_types";
        $result = $conn->query($sql);

        if($result->num_rows>0){
          while($row = $result->fetch_assoc()){
            $name=$row["name"];
            $eachId=$row["id"];
            $parentId=$row["parentId"];
            $relationTypeArray[$eachId]=new MyRelationshipType($eachId,$name,$parentId);
            echo $name;


          }
        }

        $result->close();
        $conn->close();

        // foreach ($relationTypeArray as $key => $value) {
        //   $name = $value.getName();
        //   echo "Key: $key, Value: $name";
        // }

     ?>



</div>
<?php include_once("tail.php") ?>
