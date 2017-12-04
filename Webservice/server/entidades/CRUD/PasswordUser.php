<?php
class PasswordUser
{
   public $passwordUserId;
   public $passwordAccountUser;

   function __construct(int $passwordUserId,string $passwordAccountUser){
      $this->passwordUserId = $passwordUserId;
      $this->passwordAccountUser = $passwordAccountUser;
   }
}
?>