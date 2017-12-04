<?php
class TypeLounge
{
   public $typeLoungeId;
   public $useType;

   function __construct(int $typeLoungeId,string $useType){
      $this->typeLoungeId = $typeLoungeId;
      $this->useType = $useType;
   }
}
?>