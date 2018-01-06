<?php
class UserAccount
{
   public $userAccountId;
   public $namesUser;
   public $surnames;
   public $nameUser;
   public $passwordUserId;
   public $emailUser;
   public $genderId;

   function __construct($userAccountId,$namesUser,$surnames,$nameUser,$passwordUserId,$emailUser,$genderId){
      $this->userAccountId = $userAccountId;
      $this->namesUser = $namesUser;
      $this->surnames = $surnames;
      $this->nameUser = $nameUser;
      $this->passwordUserId = $passwordUserId;
      $this->emailUser = $emailUser;
      $this->genderId = $genderId;
   }
}
?>