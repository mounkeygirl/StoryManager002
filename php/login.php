<?php
session_start();
//inport table
    $servername="localhost";

// limited rights
    // $username="guest";
    // $password="pass";
    $username=$_SESSION["username"];
    $password=$_SESSION["password"];

    $dbname="stories";

    //Create connection
    $conn = new mysqli($servername,$username,$password,$dbname);

    //check connection
    if ($conn->connect_error){
      echo "<p>User and password combination failed. Defaulting to read only permisions.</p>";
        $_SESSION["username"]=$username="guest";
        $_SESSION["password"]=$password="pass";

        $conn = new mysqli($servername,$username,$password,$dbname);
        // If this still does not work, kill connections
        if ($conn->connect_error){
          die("Both log in and user Connection failed: " .$conn->connect_error);
        }



    }
 ?>
