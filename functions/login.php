<?php
//inport table
    $servername="localhost";
    $username="guest";
    $password="pass";
    $dbname="stories";

    //Create connection
    $conn = new mysqli($servername,$username,$password,$dbname);

    //check connection
    if ($conn->connect_error){
      die("Connection failed: " .$conn->connect_error);

    }
 ?>
