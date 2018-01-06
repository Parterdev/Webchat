<?php
  $server   = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'webchat_db';

  try {
    $connect = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
  } catch (PDOException $e) {
    die('Connected failed: '.$e->getMessage());
  }

?>
