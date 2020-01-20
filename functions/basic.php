<?php
function loadHeader($pageName){
  include_once("header.php");
}

function updateIdCookie($new_value){
  setcookie("id", $new_value, time() + (86400 * 30), "/");
}

 ?>
