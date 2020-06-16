<?php
function loadHeader($pageName){
  include_once("header.php");
}

function updateIdCookie($new_value){
  setcookie("id", $new_value, time() + (86400 * 30), "/");
}


//classes
class MyCharacter{
  public $firstName;
  public $lastName;
  public $id;
  public $fullName;

  function __construct($firstName,$lastName,$id){
    $this->firstName=$firstName;
    $this->lastName=$lastName;
    $this->id=$id;
  }

//getters and setters
  function setFirstName($name){
    $this->firstName=$name;

  }

  function getFirstName(){
    return $this->firstName;
  }

  function getLastName(){
    return $this->lastName;
  }

  function getId(){
    return $this->id;
  }

}

class MyRelationshipType{
  public $id;
  public $parentId;
  public $name;

  function __construct($id,$name,$parentId){
    $this->id=$id;
    $this->name=$name;
    $this->parentId=$parentId;
  }

  function getId(){
    return $this->id;
  }

  function getParentId(){
    return $this->parentId;
  }

  function getName(){
    return $this->name;
  }


}

 ?>
