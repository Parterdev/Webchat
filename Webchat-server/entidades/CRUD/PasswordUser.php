<?php
class PasswordUser
{
   public $passwordUserId;
   public $passwordAccountUser;

   function __construct($passwordUserId,$passwordAccountUser){
      $this->passwordUserId = $passwordUserId;
      $this->passwordAccountUser = $passwordAccountUser;
   }
}
?>