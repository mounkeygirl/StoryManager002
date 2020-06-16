<?php
include_once("php/basic.php");
loadHeader("XML Test");
include_once("php/login.php");

?>

<head>
  <link rel="stylesheet" href="css/xml.css">
</head>

<body>
  <div class="verticalContainer">
    <div id="selectionArea">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">



        <select id="xmlSelect" name="xmlSelect">
          <?php
            $sqlSearch="SELECT * FROM xml;";
            $result=$conn->query($sqlSearch);

            if($result->num_rows>0){
              while($row = $result->fetch_assoc()){
                $fileName=$row["filename"];
                $id=$row["id"];
                echo "<option value=$id>$fileName</option>";
              }
            }
            $result->close();
           ?>
        </select>
        <button type="submit" name="button">Change File</button>
      </form>
    </div>
    <div id="totalXML">
      <div id="xmlFile">

        <?php
        $xslFile='story.xsl';
        $xmlNumber=$_POST["xmlSelect"];
        if ($xmlNumber==""){
          print("No number selected");
          $xmlLoadFile="familyReunion.xml";
        } else{
          $sqlSearch="SELECT filename FROM xml WHERE id=$xmlNumber LIMIT 1";

          $result=$conn->query($sqlSearch);




          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $fileName=$row["filename"];
            }
          }

          // print("Filename: "+$fileName);

          $xmlLoadFile=$fileName;

        }


              include("php/loadXml.php"); ?>
      </div>
      <div id="metaData">
        <?php
        $xslFile='metaData.xsl';
        $xmlLoadFile="familyReunion.xml";
              include("php/loadXml.php"); ?>

      </div>
    </div>
  </div>
</body>


<?php
include_once("tail.php");
$conn->close();
 ?>
