<?php
class TypeAccount
{
   public $typeAccountId;
   public $typeAcount;

   function __construct($typeAccountId,$typeAcount){
      $this->typeAccountId = $typeAccountId;
      $this->typeAcount = $typeAcount;
   }
}
?>