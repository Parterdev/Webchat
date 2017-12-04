<?php
class Lounge
{
   public $loungeId;
   public $nameLounge;
   public $passwordLounge;
   public $typeLoungeId;

   function __construct(int $loungeId,string $nameLounge,string $passwordLounge,int $typeLoungeId){
      $this->loungeId = $loungeId;
      $this->nameLounge = $nameLounge;
      $this->passwordLounge = $passwordLounge;
      $this->typeLoungeId = $typeLoungeId;
   }
}
?>