<?php
class TypeLounge
{
   public $typeLoungeId;
   public $useType;

   function __construct($typeLoungeId,$useType){
      $this->typeLoungeId = $typeLoungeId;
      $this->useType = $useType;
   }
}
?>