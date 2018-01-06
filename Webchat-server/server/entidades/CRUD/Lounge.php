<?php
class Lounge
{
   public $loungeId;
   public $nameLounge;
   public $passwordLounge;
   public $typeLoungeId;

   function __construct($loungeId,$nameLounge,$passwordLounge,$typeLoungeId){
      $this->loungeId = $loungeId;
      $this->nameLounge = $nameLounge;
      $this->passwordLounge = $passwordLounge;
      $this->typeLoungeId = $typeLoungeId;
   }
}
?>