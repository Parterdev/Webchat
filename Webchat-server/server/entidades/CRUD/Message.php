<?php
class Message
{
   public $messageId;
   public $userAccountId;
   public $loungeId;
   public $messageText;
   public $dateMessage;

   function __construct($messageId,$userAccountId,$loungeId,$messageText,$dateMessage){
      $this->messageId = $messageId;
      $this->userAccountId = $userAccountId;
      $this->loungeId = $loungeId;
      $this->messageText = $messageText;
      $this->dateMessage = $dateMessage;
   }
}
?>