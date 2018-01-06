<?php
class Membership
{
   public $membershipId;
   public $userAccountId;
   public $loungeId;
   public $dateInitial;
   public $dateFinal;

   function __construct($membershipId,$userAccountId,$loungeId,$dateInitial,$dateFinal){
      $this->membershipId = $membershipId;
      $this->userAccountId = $userAccountId;
      $this->loungeId = $loungeId;
      $this->dateInitial = $dateInitial;
      $this->dateFinal = $dateFinal;
   }
}
?>