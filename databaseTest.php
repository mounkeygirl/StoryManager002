

<?php
//Establish cookies
$cookie_name="id";
$cookie_value=23;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day


function openCharacterWindow($new_value){
  updateIdCookie($new_value);
}

//input eader
include_once("php/basic.php");
loadHeader("Character Info");

include_once("php/login.php");

    $sql = "SELECT * FROM Characters";
    $result = $conn->query($sql);

    if($result->num_rows>0){
      //need a form to handle this for the buttons
      echo "<form action=\"characterInfo.php\" method=\"post\">";
      //put output into div
      echo "<table id=\"outputBox\">";
      //output data of each row
      while($row = $result->fetch_assoc()){
        $idNum=$row["id"];
        $fname=$row["firstName"];
        $lname=$row["lastName"];
        echo"<tr>
        <td>$idNum</td>
        <td>$fname</td>
        <td>$lname</td>
        ";
        $btnName="chara_".$idNum;
        //insert radio buttons
        echo '<td>
        <input type="radio" name="idSelection"';
        if(isset($idSelection) and $idSelection=="$idNum") echo "checked";
        echo "value='$idNum'>$idNum</td>";

        echo "<tr>";
      }
      echo "<input type=\"submit\">";
      //end outputBox table, and the form
      echo "</table></form>";

    } else {
      echo "0 results";
    }
     ?>

  </body>




</html>
