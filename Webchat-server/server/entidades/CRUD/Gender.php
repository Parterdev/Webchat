<?php
class Gender
{
   public $genderId;
   public $genderPerson;

   function __construct($genderId,$genderPerson){
      $this->genderId = $genderId;
      $this->genderPerson = $genderPerson;
   }
}
?>