<?php
class Message
{
   public $messageId;
   public $userAccountId;
   public $loungeId;
   public $messageText;
   public $dateMessage;

   function __construct(int $messageId,int $userAccountId,int $loungeId,string $messageText,DateTime $dateMessage){
      $this->messageId = $messageId;
      $this->userAccountId = $userAccountId;
      $this->loungeId = $loungeId;
      $this->messageText = $messageText;
      $this->dateMessage = $dateMessage;
   }
}
?>