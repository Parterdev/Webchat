<?php
class UserType
{
   public $userTypeId;
   public $userAccountId;
   public $typeAccountId;

   function __construct($userTypeId,$userAccountId,$typeAccountId){
      $this->userTypeId = $userTypeId;
      $this->userAccountId = $userAccountId;
      $this->typeAccountId = $typeAccountId;
   }
}
?>