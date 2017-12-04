<?php
class UserAccount
{
   public $userAccountId;
   public $userName;
   public $passwordUserId;
   public $emailUser;
   public $firstName;
   public $lastName;
   public $genderId;

   function __construct(int $userAccountId,string $userName,int $passwordUserId,string $emailUser,string $firstName,string $lastName,int $genderId){
      $this->userAccountId = $userAccountId;
      $this->userName = $userName;
      $this->passwordUserId = $passwordUserId;
      $this->emailUser = $emailUser;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->genderId = $genderId;
   }
}
?>