<!-- include $pageName for the name of the page -->
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo "$pageName"?></title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/database.css">

  </head>
  <body>
    <header>
        <div id=pageTitle>
          <h1>Story Manager</h1>
          <h2><?php echo "$pageName" ?></h2>
        </div>
      <div id=logInStatus>
        <h3><i>Username:</i><?php echo  $_SESSION["username"]?></h3>
        <a href="loginPage.php"><div class="myButton">
          Change User
        </div></a>
      </div>
    </header>
    <div id="content">
      <?php include_once("sidebar.php") ?>
      <div id="primaryContent">
