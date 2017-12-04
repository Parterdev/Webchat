<?php
class Gender
{
   public $genderId;
   public $genderPerson;

   function __construct(int $genderId,string $genderPerson){
      $this->genderId = $genderId;
      $this->genderPerson = $genderPerson;
   }
}
?>